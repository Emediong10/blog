<div  class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600" >

            @if ($this->activeCategory || $search)
           <button class="mr-3 text-xs red-500" wire:click='clearFilters()'> X </button>

            @endif
            @if($this->activeCategory)
            {{-- All post: --}}
            <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->title]) }}" :textColor="$this->activeCategory->text_color"
                :bgColor="$this->activeCategory->bg_color">
                {{ $this->activeCategory->title }}
            </x-badge>
            @endif

            @if($search)
            <span class="ml-2"> Containing: <strong>{{ $search }}</strong>
            </span>

            @endif


        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort==='desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-700' }} py-4 "
             wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort==='asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-700' }} py-4"
             wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
       @foreach ($this->posts as $post)
       <x-posts.post-item :key="$post->id" :post="$post"/>
       @endforeach

    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>