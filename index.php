<!DOCTYPE html>
<html>
    <body>
      <h1>Upload A CSV</h1>

      <form enctype="multipart/form-data" action="./" method="POST">
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
          Send this file: <input name="csvUpload" type="file" />
          <input type="submit" name="submit" value="Send File" />
      </form>

    </body>
</html>
