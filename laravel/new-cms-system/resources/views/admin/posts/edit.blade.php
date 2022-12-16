<x-admin-master>

    @section('content')

        <h1>Edit a Post</h1>
        
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        id="title"
                        aria-describedby=""
                        value="{{ $post->title }}"
                        placeholder="Enter title">
                        
                </div>
                <div class="form-group">
                    <div><img height="100px" src="{{ $post->post_image }}"></div>
                    <label for="file">File</label>
                    <input 
                        type="file" 
                        name="post_image" 
                        class="form-control-file" 
                        id="post_image">
                        
                </div>
                <div class="form-group">
                    
                    <textarea 
                        name="body" 
                        class="form-control" 
                        id="body" 
                        cols="30" 
                        rows="10"
                        >
                        {{ $post->body }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    @endsection

</x-admin-master>