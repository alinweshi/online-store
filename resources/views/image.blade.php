<form action="{{ route('storeimage') }}" method="POST" enctype="multipart/form-data">
@csrf
@method("POST")
<input type="file" name="image">
<input type="text" name="foldername">
<button type="submit">submit</button>
</form>