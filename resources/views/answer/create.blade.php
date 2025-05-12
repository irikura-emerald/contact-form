<x-app-layout>
    <h1>回答作成</h1>
    <ul>
        <li>{{ $question->id }}</li>
        <li>{{ $question->name }}</li>
        <li>{{ $question->mail_address }}</li>
        <li>{{ $question->telephonenumber }}</li>
        <li>{{ $question->message }}</li>
    </ul>
</x-app-layout>