// When the user clicks the button, open the modal
$("#tso_add_btn").click(function () {
  $("#tso_confirm_btn").show();
  $("#tso_name").val("");
  $("#tso_confirm_btn").attr("value", "save");
  $("#tso_Modal").show();
});

$("#tso_times").click(function () {
  $("#tso_Modal").hide();
});
$("#tso_close_btn").click(function () {
  $("#tso_Modal").hide();
});

//ADD TSO
//console.log($('#saveTso').length);

function tso_save(type) {
  var id = $("#tso_name").attr("no");
  var name = $("#tso_name").val();
  var data = {
    name: name,
    tso_id: id,
    type: type,
  };
  console.log(data);
  $.ajax({
    type: "POST",
    url: "codes/codeTso.php",
    data: data,
    success: function (res) {
      //   res = JSON.parse(response);
      $("#tso_Modal").hide();
      alertify.set("notifier", "position", "top-center");
      alertify.success("Success");
      //refresh
      $(document).ready(function () {
        $("#myTableTso").load(location.href + " #myTableTso");
      });
    },
    error: function (xhr, status, error) {},
  });
}

//EDIT TSO
$("table").on("click", ".editTsoBtn", function () {
  var name = $(this).parent().siblings(".name").text();
  var id = $(this).attr("value");
  $("#tso_confirm_btn").show();
  $("#tso_name").attr("readonly", false);
  $("#tso_name").val(name);
  $("#tso_name").attr("no", id);
  $("#tso_confirm_btn").attr("value", "update");
  $("#tso_Modal").show();
});

$("#tso_confirm_btn").click(function (e) {
  var type = $(this).attr("value");
  if (type == "save") {
    tso_save("save_tso");
  } else tso_save("update_tso");
});

$("table").on("click", ".deleteTsotBtn", function () {
  var id = $(this).attr("value");
  delete_tso(id);
});

function delete_tso(id) {
  $.ajax({
    type: "POST",
    url: "codes/codeTso.php",
    data: { tso_id: id, type: "delete_tso" },
    success: function (res) {
      alertify.set("notifier", "position", "top-center");
      alertify.error("TSO Deleted Successfully!");
      //refresh
      $(document).ready(function () {
        $("#myTableTso").load(location.href + " #myTableTso");
      });
    },
    error: function (xhr, status, error) {},
  });
}

$("table").on("click", ".viewTsoBtn", function () {
  var name = $(this).parent().siblings(".name").text();
  var id = $(this).attr("value");
  $("#tso_name").val(name);
  $("#tso_name").attr("readonly", true);
  $("#tso_name").attr("no", id);
  $("#tso_confirm_btn").hide();
  $("#tso_Modal").show();
});
