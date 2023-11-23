<form action="{{ route('storedata') }}" method="POST"  enctype="multipart/form-data">
@csrf
<input type="file" name="image">
<input type="text" name="foldername">
<button type="submit">submit</button>
</form>