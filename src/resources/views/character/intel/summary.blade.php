@extends('web::character.intel.layouts.view', ['sub_viewname' => 'summary'])

@section('title', trans_choice('web::seat.character', 1) . ' ' . trans('web::seat.intel'))
@section('page_header', trans_choice('web::seat.character', 1) . ' ' . trans('web::seat.intel'))

@inject('request', 'Illuminate\Http\Request')

@section('intel_content')

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#" data-toggle="tab" data-characters="single">{{trans_choice('web::seat.character',1)}}</a></li>
      <li><a href="#" data-toggle="tab" data-characters="all">{{ trans('web::seat.linked_characters') }}</a></li>
    </ul>

    <div class="tab-content">
      <h3>Top Wallet Journal Interactions</h3>

      <table class="table compact table-condensed table-hover table-responsive"
             id="character-top-journal-interactions" data-page-length=10>
        <thead>
        <tr>
          <th>Total</th>
          <th>Type</th>
          <th>Character Name</th>
          <th>Character Corp</th>
          <th>Character Alliance</th>
        </tr>
        </thead>
      </table>

      <!-- Journal Content Modal -->
      <div class="modal fade" id="journalContentModal" tabindex="-1" role="dialog"
           aria-labelledby="journalContentModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="journalContentModalLabel">{{ trans('web::seat.wallet_journal') }}</h4>
            </div>
            <div class="modal-body">
              <table class="table compact table-condensed table-hover table-responsive"
                     id="character-journal" data-page-length=100>
                <thead>
                <tr>
                  <th>{{ trans('web::seat.date') }}</th>
                  <th>{{ trans_choice('web::seat.type', 1) }}</th>
                  <th>{{ trans('web::seat.owner_1') }}</th>
                  <th>{{ trans('web::seat.owner_2') }}</th>
                  <th>{{ trans('web::seat.amount') }}</th>
                  <th>{{ trans('web::seat.balance') }}</th>
                </tr>
                </thead>
              </table>

            </div>
            </div>
          </div>
        </div>

      <hr>

      <h3>Top Wallet Transaction Interactions</h3>

      <table class="table compact table-condensed table-hover table-responsive"
             id="character-top-transaction-interactions" data-page-length=10>
        <thead>
        <tr>
          <th>Total</th>
          <th>Character Name</th>
          <th>Character Corp</th>
          <th>Character Alliance</th>
        </tr>
        </thead>
      </table>

    <!-- Transaction Content Modal -->
    <div class="modal fade" id="transactionContentModal" tabindex="-1" role="dialog"
         aria-labelledby="transactionContentModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="transactionContentModalLabel">{{ trans('web::seat.wallet_transactions') }}</h4>
          </div>
          <div class="modal-body">

            <table class="table compact table-condensed table-hover table-responsive"
                   id="character-transactions">
              <thead>
              <tr>
                <th>{{ trans('web::seat.date') }}</th>
                <th></th>
                <th>{{ trans_choice('web::seat.type', 1) }}</th>
                <th>{{ trans('web::seat.qty') }}</th>
                <th>{{ trans('web::seat.price') }}</th>
                <th>{{ trans('web::seat.total') }}</th>
                <th>{{ trans('web::seat.client') }}</th>
              </tr>
              </thead>
            </table>

            </div>
          </div>

        </div>
      </div>


      <hr>

      <h3>Top Mail Interactions</h3>

      <table class="table compact table-condensed table-hover table-responsive"
             id="character-top-mail-interactions" data-page-length=10>
        <thead>
        <tr>
          <th>Total</th>
          <th>Character Name</th>
          <th>Character Corp</th>
          <th>Character Alliance</th>
        </tr>
        </thead>
      </table>

    </div>
  </div>

@stop

@push('javascript')

<script>

  $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    characterTopJournalTable.draw();
    characterTopTransactionTable.draw();
    characterTopMailTable.draw();
  });

  function allLinkedCharacters() {

    var character_ids = $("div.nav-tabs-custom > ul > li.active > a").data('characters');
    return character_ids !== 'single';
  }

  var characterTopJournalTable = $('table#character-top-journal-interactions').DataTable({
    processing  : true,
    serverSide  : true,
    searching   : false,
    ordering    : false,
    ajax        : {
      url: '{{ route('character.view.intel.summary.journal.data', ['character_id' => $request->character_id]) }}',
      data: function ( d ) {
        d.all_linked_characters = allLinkedCharacters();
      }
    },
    columns     : [
      {data: 'total', name: 'total', searchable: false},
      {data: 'ref_type', name: 'ref_type'},
      {data: 'character', name: 'first_party.name'},
      {data: 'corporation', name: 'corporation_id'},
      {data: 'alliance', name: 'alliance_id'}
    ],
    drawCallback: function () {

      $('img').unveil(100);
      ids_to_names();

      // After loading the journal data, bind a click event
      // on items with the journal-contet class.
      $('a.journal-content').on('click', function () {

        var url = $(this).attr('data-url');

        alert('journal');

        var characterJournal = $('table#character-journal').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: url
          },
          columns: [
            {data: 'date', name: 'date', render: human_readable, type: 'date'},
            {data: 'ref_type', name: 'ref_type'},
            {data: 'first_party_id', name: 'first_party.name'},
            {data: 'second_party_id', name: 'second_party.name'},
            {data: 'amount', name: 'amount'},
            {data: 'balance', name: 'balance'},
            {data: 'reason', name: 'reason', visible: false}
          ],
          drawCallback : function () {
            $("[data-toggle=tooltip]").tooltip();
            $('img').unveil(100);
            ids_to_names();

            $('#journalContentModal').on('hide.bs.modal', function () {
              characterJournal.destroy();
            });
          }
        });

        characterJournal.draw();

      });

    }
  });

  var characterTopTransactionTable = $('table#character-top-transaction-interactions').DataTable({
    processing  : true,
    serverSide  : true,
    searching   : false,
    ordering    : false,
    ajax        : {
      url: '{{ route('character.view.intel.summary.transactions.data', ['character_id' => $request->character_id]) }}',
      data: function ( d ) {
        d.all_linked_characters = allLinkedCharacters();
      }
    },
    columns     : [
      {data: 'total', name: 'total', searchable: false},
      {data: 'character', name: 'character'},
      {data: 'corporation', name: 'corporation'},
      {data: 'alliance', name: 'alliance'}
    ],
    drawCallback: function () {

      $('img').unveil(100);
      ids_to_names();

      // After loading the journal data, bind a click event
      // on items with the journal-contet class.
      $('a.transaction-content').on('click', function () {

        var url = $(this).attr('data-url');

        var character_transactions = $('table#character-transactions').DataTable({
          processing  : true,
          serverSide  : true,
          ajax        : {
            url : url
          },
          columns     : [
            {data: 'date', name: 'date', render: human_readable},
            {data: 'is_buy', searchable: false},
            {data: 'item_view', name: 'type.typeName'},
            {data: 'quantity', name: 'quantity'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'total', name: 'unit_price'},
            {data: 'client_view', name: 'client.name'}
          ],
          drawCallback: function () {
            $('img').unveil(100);
            ids_to_names();
            $('[data-toggle="tooltip"]').tooltip();

            $('#transactionContentModal').on('hide.bs.modal', function () {
              character_transactions.destroy();
            });
          }
        });
      });
    }
  });


  var characterTopMailTable = $('table#character-top-mail-interactions').DataTable({
    processing  : true,
    serverSide  : true,
    searching   : false,
    ordering    : false,
    ajax        : {
      url: '{{ route('character.view.intel.summary.mail.data', ['character_id' => $request->character_id]) }}',
      data: function ( d ) {
        d.all_linked_characters = allLinkedCharacters();
      }
    },
    columns     : [
      {data: 'total', name: 'total', searchable: false},
      {data: 'character_id', name: 'character_id'},
      {data: 'corporation_id', name: 'corporation_id'},
      {data: 'alliance_id', name: 'alliance_id'}
    ],
    drawCallback: function () {
      $('img').unveil(100);
      ids_to_names();
    }
  });


</script>

@endpush
