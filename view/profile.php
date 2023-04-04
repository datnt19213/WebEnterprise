<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="../css/feedbackCreate.css" />
    <link rel="stylesheet" href="../css/profile.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="fb-create-container">
      <form
        action=""
        method="post"
        enctype="multipart/form-data"
        class="fb-create-form"
      >
        <div class="fb-content-input">
          <div class="fb-content-label">
            <p class="fb-create-tittle">Your Profile</p>
          </div>
          <div class="pr-form-input">
            <input
              type="text"
              name=""
              placeholder="Your name"
              class="fb-end-date"
            />
            <div class="fb-end-date">
              <p class="fb-end-date-label">Birthday</p>
              <input
                type="date"
                name=""
                id="inputDate"
                class="fb-end-date-input"
              />
            </div>
          </div>
          <div class="pr-form-input">
            <input
              type="tel"
              placeholder="Your phone number"
              name=""
              class="fb-end-date"
            />
            <select name="" id="" class="option-list-cate" required>
              <option value="0" selected>Your position</option>
              <option value="">position 1</option>
              <option value="">position 2</option>
              <option value="">position 3</option>
              <option value="">position 4</option>
              <option value="">position 5</option>
              <option value="">position 6</option>
            </select>
          </div>
          <input
            type="email"
            placeholder="Your email"
            name=""
            class="fb-end-date"
          />
          <input
            type="text"
            placeholder="Address"
            name=""
            class="fb-end-date"
          />
          <div class="pr-form-input">
            <select name="" id="" class="option-list-cate" required>
              <option value="0" selected>Your department</option>
              <option value="">Your department 1</option>
              <option value="">Your department 2</option>
              <option value="">Your department 3</option>
              <option value="">Your department 4</option>
              <option value="">Your department 5</option>
              <option value="">Your department 6</option>
            </select>
            <input
              type="text"
              placeholder="Description"
              name=""
              class="fb-end-date"
            />
          </div>
        </div>
        <div class="fb-file-time-submit">
          <div class="select-data-to-submit">
            <div class="fb-file-input">
              <input type="file" name="" id="fileInput" style="display: none" />
              <label for="fileInput" class="label-input-file">
                Import Avatar
              </label>
              <p>abc.xyz</p>
            </div>
            <button type="submit" class="create-fb-btn">Create</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
