<?php
/**
 * MIT License.
 *
 * Copyright (c) 2019. Felix Huber
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Seat\Web\Test;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Seat\Eveapi\EveapiServiceProvider;
use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Eveapi\Models\RefreshToken;
use Seat\Services\ServicesServiceProvider;
use Seat\Web\Models\Group;
use Seat\Web\Models\User;
use Seat\Web\Test\Stubs\Kernel;
use Seat\Web\WebServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected $test_user;

    protected $group;

    public function setUp()
    {
        parent::setUp();

        // Setup database
        $this->setupDatabase($this->app);
        $this->withFactories(__DIR__.'/database/factories');

        $this->test_user = factory(User::class)->create();

        factory(CharacterInfo::class)->create([
            'character_id' => $this->test_user->id,
            'name' => $this->test_user->name
        ]);

        factory(RefreshToken::class)->create([
            'character_id' => $this->test_user->id,
        ]);

        $this->group = Group::find($this->test_user->group_id);
    }

    /**
     * Resolve application HTTP Kernel implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Http\Kernel', Kernel::class);
    }

    protected function getPackageProviders($app)
    {
        // ConsoleServiceProvider required to make migrations work
        return [
            \Orchestra\Database\ConsoleServiceProvider::class,
            WebServiceProvider::class,
            EveapiServiceProvider::class, //TODO: comment out
            WebServiceProvider::class,
            ServicesServiceProvider::class,
        ];
    }


    protected function getEnvironmentSetUp($app)
    {
        // Use memory SQLite, cleans it self up
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('auth.providers.users.model', User::class);
    }
    protected function setupDatabase($app)
    {
        $this->artisan('migrate', ['--database' => 'testbench']);
    }
}