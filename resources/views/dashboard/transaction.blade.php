<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Category</th>
            <th scope="col">Account</th>
            <th scope="col">Amount</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as  $transaction)
            <tr>
                <th scope="row">{{ $transaction->date }}</th>
                <td>{{ $transaction->category }}</td>
                <td>{{ $transaction->account_name }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
            </tr>
         @empty
           <tr>
                <td colspan="5">No Data Found</td>
           </tr> 
        @endforelse
    </tbody>
</table>