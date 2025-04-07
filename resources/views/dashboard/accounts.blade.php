@forelse ($accounts as $account)
    <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card bg-gradient-danger text-white">
            <div class="card-body">
                <div class="text-center">{{ $account->name }}</div>
                <div class="py-2 m-0 text-center h3">Rs {{ $account->current_balance }}</div>
                {{-- <div class="d-flex">
                    <small>this month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-green"></i> 15%</div>
                </div> --}}
            </div>
        </div>
    </div>
    
@empty
    <h3>No Accounts Found</h3>
@endforelse