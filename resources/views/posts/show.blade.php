<x-app-layout>
    <div class="container py-4"></h1>
       <h1>{{ $post->name }} :</h1>
       <h5>{!! $post->extract !!}</h5>
    </div>
    <div class="m-4">
    <p>{!!$post->body!!}</p>
    </div>
    <div class="card">
        <div class="card-body">
            @if($post->image)
                <img src="{{ Storage::url($post->image->url) }}" alt="">
                {{-- Debugging URL --}}
                <p>{{ Storage::url($post->image->url) }}</p>
            @else
            <div class="d-flex justify-content-center">
                <img src="https://53.fs1.hubspotusercontent-na1.net/hub/53/hubfs/image8-2.jpg?width=595&height=400&name=image8-2.jpg" alt="">
            </div>
            @endif
        </div>
    </div>
</x-app-layout>