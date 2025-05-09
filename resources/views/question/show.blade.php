<x-simple-layout>
    <h1>お問合わせ一覧</h1>
    @foreach ($questions as $post)
        {{ $post->id }}
        {{ $post->name }}
        {{ $post->message }}
        {{ $post->created_at }}

    @endforeach
</x-simple-layout>