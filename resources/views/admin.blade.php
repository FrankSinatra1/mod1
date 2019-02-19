@extends("layouts.head")
@section('content')


<div class="wrapper-admin">
	<div class="form">
		<form action="{{ route('post.create') }}" class="flex" enctype="multipart/form-data" method="post">
			<p>Добавление поста</p>
			<input type="text" name="title" placeholder="Заголовок">
			<input type="text" name="anons" placeholder="Анонс">
			<input type="text" name="text" placeholder="Текст">
			<button>Добавить</button>
		</form>
	</div>
</div>



@endsection