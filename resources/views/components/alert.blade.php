<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong> {{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->any())
    <div class="py-4 px-2 bg-red-300">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('massage'))
        <div class=" py-4 px-2 bg-green-300 font-bold"> 
            <strong>{{ session('massage') }}</strong>
        </div>
       
    @endif
</div>
