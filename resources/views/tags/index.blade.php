<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
      <div class="mb-3">  
        <a href="{{ route('tags.create') }}" class="btn-primary">新規登録</a>
      </div>

        <table>
          <caption>タグ一覧</caption>
          <thead>
            <tr>
              <th width="50">ID</th>
              <th>タイトル</th>
              <th>アクション</th>
            </tr>
          </thead>
          @foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->id }}</td>
              <td>{{ $tag->title }}</td>
              <td>
              <a href="{{ route('tags.show',$tag->id) }}" class="btn btn-secondary btn-sm">表示</a>
                <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-secondary btn-sm">編集</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                  
                  @csrf
                  <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm">削除</button>
                </form>
              </td>
            </tr>
              
          @endforeach
        </table>
        <br>
        {{ $tags->links() }}
      
  </x-auth-card>
</x-guest-layout>
