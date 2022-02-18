@foreach ($arrayl as $image)
        <li class="col flex-column">
            <a href="{{ route("image.detail", array("id" => $image->id)) }}">
            <div class="flex-column p-3 ">
                <img src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage}}" class="card-img-top" alt="...">
                <div class="card-body badge bg-primary text-wrap    ">
                    <i class=".glyphicon .glyphicon-heart-empty" onclick="alterna_like(this)" data-id="{{ $image->id }}" data-likes=" 0" id="likes{{ $image->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg></i> 
                    <p style="word-wrap: break-word"class="card-text">{{ $image->description }}</p>
                </div>
            </div>
            </a>
        </li> 
    @endforeach  