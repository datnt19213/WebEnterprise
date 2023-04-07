<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback Create</title>
  <link rel="stylesheet" href="../css/feedbackCreate.css" />
  <link rel="stylesheet" href="../css/profile.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="fb-create-container">
    <form action="" method="post" enctype="multipart/form-data" class="fb-create-form">
      <div class="fb-content-input">
        <div class="fb-content-label">
          <p class="fb-create-tittle">Feedback Create</p>
        </div>
        <div class="wrapper-textarea">
          <textarea class="textarea-feedback-content" name="" id="" cols="30" rows="18" maxlength="10000" placeholder="Feedback Content"></textarea>
        </div>
      </div>
      <div class="fb-file-time-submit">
        <div class="select-data-to-submit">
          <div class="fb-file-input">
            <input type="file" name="" id="fileInput" style="display: none" />
            <label for="fileInput" class="label-input-file">
              Document Import
            </label>
            <p>abc.xyz</p>
          </div>
          <select name="" id="" class="option-list-cate" required>
            <option value="0" selected>Select Category</option>
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
            <option value="">6</option>
          </select>

          <div class="fb-end-date">
            <p class="fb-end-date-label">Started on</p>
            <input type="date" name="" id="inputDate" class="fb-end-date-input" />
          </div>
          <div class="fb-end-date">
            <p class="fb-end-date-label">Ended on</p>
            <input type="date" name="" id="inputDate" class="fb-end-date-input" />
          </div>
        </div>
        <div class="submit-group">
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="" value="check box" />
            <p class="terms-check">Post As Anonymous</p>
          </label>
          <button type="submit" class="create-fb-btn">Create</button>
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="" value="check box" />
            <p class="terms-check">Accepted Terms & Conditions</p>
          </label>
        </div>
      </div>
    </form>
  </div>
</body>

</html>