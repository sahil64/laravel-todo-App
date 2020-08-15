<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    {{$slot}}
    @if(session()->has('message'))
        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
           {{session()->get('message')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>