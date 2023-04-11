$(document).ready(function () {
  const checkboxSetData = document.getElementById("fbCrea_SaveContent");
  // const createBtn = document.getElementById("createFbBtn");
  const dataInput = document.getElementById("contentFeedback");
  dataInput.addEventListener("change", function () {
    localStorage.setItem("SavedValue", dataInput.value);
  });
  checkboxSetData.addEventListener("click", function () {
    if (!localStorage.getItem("SavedValue")) {
      alert("Recent content not available");
      checkboxSetData.checked = false;
      return;
    }
    if (!checkboxSetData.checked) {
      dataInput.value = dataInput.value.replace(
        localStorage.getItem("SavedValue"),
        ""
      );
      return;
    }
    dataInput.value = dataInput.value + localStorage.getItem("SavedValue");
  });
});
