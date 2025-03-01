<div class="text-wrap">
    {{-- <div class="example"> --}}
        {{-- @if($errors->any())
             <div class="alert alert-icon alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>{{ $error }}<br>
                @endforeach
            </div>
        @endif --}}


        @if(Session::has('success'))
            <div class="alert alert-icon alert-success" role="alert">
                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
             <div class="alert alert-icon alert-danger" role="alert">
                <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>{{ Session::get('error') }}
            </div>
        @endif
    {{-- </div> --}}
</div>
