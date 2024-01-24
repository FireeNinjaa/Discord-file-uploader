# Fileupload-to-Discord
This is a simple php api to upload a file to a discord server with an webhook

* [![JQuery][JQuery.com]][JQuery-url]

### Installation

_Below is an example how to use it._

1. Set your Webhook in the upload.php file in the third line.

2. Here is the example how to use it: 

*html
```sh
<form action="http://localhost/uploadapi/upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Select a file to upload:</label><br>
    <input type="file" name="file" id="file" required><br>
    <input type="submit" value="Upload">
</form>
```

Have fun
