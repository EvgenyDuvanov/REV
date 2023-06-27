<x-card>
    <x-card-body>
            <h2>
                <a href="{{ route('blog.show', $post->id) }}">
            {{ $post->title }}  
                </a>
            </h2>
                {{-- используем !! для того, что бы вывести чистый хтмл --}}
            <div class="small text-muted">
              
                {{-- now возвращает объект, с которым можно работать далее. КАРБОН. ФОрмат форматирует --}}
                {{ $post->published_at }} 
              
            </div>
    </x-card-body>
</x-card>