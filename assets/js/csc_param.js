// When the user clicks the button, open the modal
$("#csc_param_add_btn").click(function () {
    $("#csc_param_confirm_btn").show();
    $("#csc_param_ra").val("");
    $("#csc_param_cnt1").val("");
    $("#csc_param_cnt2").val("");
    $("#csc_param_xnec1").val("");
    $("#csc_param_xnec2").val("");
    $("#csc_param_q").val("");
    $("#csc_param_rsba").val("");
    $("#csc_param_rsme").val("");
    $("#csc_param_bame").val("");

    $("#csc_param_confirm_btn").attr("value", "save");
    $("#csc_param_Modal").show();
  });
  
  $("#csc_param_hide").click(function () {
    $("#csc_param_Modal").hide();
  });
  $("#csc_param_close_btn").click(function () {
    $("#csc_param_Modal").hide();
  });
  
  //ADD CSC
  //console.log($('#saveTso').length);
  function csc_param_save(type) {
    var id = $("#csc_param_ra").attr("no");
    var ra = $("#csc_param_ra").val();
    var cnt1 = $("#csc_param_cnt1").val();
    var cnt2 = $("#csc_param_cnt2").val();
    var xnec1 = $("#csc_param_xnec1").val();
    var xnec2 = $("#csc_param_xnec2").val();
    var q = $("#csc_param_q").val();
    var rsba = $("#csc_param_rsba").val();
    var rsme = $("#csc_param_rsme").val();
    var bame = $("#csc_param_bame").val();

    var data = {
      csc_id: id,
      csc_ra: ra,
      csc_cnt1: cnt1,
      csc_cnt2: cnt2,
      csc_xnec1: xnec1,
      csc_xnec2: xnec2,
      csc_q: q,
      csc_rsba: rsba,
      csc_rsme: rsme,
      csc_bame: bame,
      type: type,
    };
    //console.log(data);
    $.ajax({
      type: "POST",
      url: "codes/codeCscParam.php",
      data: data,
      success: function (res) {
        //   res = JSON.parse(response);
        $("#csc_param_Modal").hide();
        alertify.set("notifier", "position", "top-center");
        alertify.success("Success Radi");
        //refresh
        $(document).ready(function () {
          $("#myTableCscParam").load(location.href + " #myTableCscParam");
        });
      },
      error: function (xhr, status, error) {},
    });
  }
  //EDIT TSO
  $("table").on("click", ".editCscParamBtn", function () {
    var id = $(this).attr("value");
    var ra = $(this).parent().siblings(".csc_param_ra").text();
    var cnt1 = $(this).parent().siblings(".csc_param_cnt1").text();
    var cnt2 = $(this).parent().siblings(".csc_param_cnt2").text();
    var xnec1 = $(this).parent().siblings(".csc_param_xnec1").text();
    var xnec2 = $(this).parent().siblings(".csc_param_xnec2").text();
    var q = $(this).parent().siblings(".csc_param_q").text();
    var rsba = $(this).parent().siblings(".csc_param_rsba").text();
    var rsme = $(this).parent().siblings(".csc_param_rsme").text();
    var bame = $(this).parent().siblings(".csc_param_bame").text();
    
   
    $("#csc_param_ra").attr("readonly", false);
    $("#csc_param_cnt1").attr("readonly", false);
    $("#csc_param_cnt2").attr("readonly", false);
    $("#csc_param_xnec1").attr("readonly", false);
    $("#csc_param_xnec2").attr("readonly", false);
    $("#csc_param_q").attr("readonly", false);
    $("#csc_param_rsba").attr("readonly", false);
    $("#csc_param_rsme").attr("readonly", false);
    $("#csc_param_bame").attr("readonly", false);

    $("#csc_param_ra").val(ra);
    $("#csc_param_cnt1").val(cnt1);
    $("#csc_param_cnt2").val(cnt2);
    $("#csc_param_xnec1").val(xnec1);
    $("#csc_param_xnec2").val(xnec2);
    $("#csc_param_q").val(q);
    $("#csc_param_rsba").val(rsba);
    $("#csc_param_rsme").val(rsme);
    $("#csc_param_bame").val(bame);

    $("#csc_param_ra").attr("no", id);

    $("#csc_param_confirm_btn").show();
    $("#csc_param_confirm_btn").attr("value", "update");
    $("#csc_param_Modal").show();
  });
   
  $("#csc_param_confirm_btn").click(function (e) {
    var type = $(this).attr("value");
    if (type == "save") {
        csc_param_save("save_csc_param");
    } else csc_param_save("update_csc_param");
  });
  
  $("table").on("click", ".deleteCscParamBtn", function () {
    var id = $(this).attr("value");
    delete_csc_param(id);
  });
  
  function delete_csc_param(id) {
    $.ajax({
      type: "POST",
      url: "codes/codeCscParam.php",
      data: { csc_id: id, type: "delete_csc_param" },
      success: function (res) {
        alertify.set("notifier", "position", "top-center");
        alertify.error("CSC Deleted Successfully!");
        //refresh
        $(document).ready(function () {
          $("#myTableCscParam").load(location.href + " #myTableCscParam");
        });
      },
      error: function (xhr, status, error) {},
    });
  }
  
  $("table").on("click", ".viewCscParamBtn", function () {
    var ra = $(this).parent().siblings(".csc_param_ra").text();
    var cnt1 = $(this).parent().siblings(".csc_param_cnt1").text();
    var cnt2 = $(this).parent().siblings(".csc_param_cnt2").text();
    var xnec1 = $(this).parent().siblings(".csc_param_xnec1").text();
    var xnec2 = $(this).parent().siblings(".csc_param_xnec2").text();
    var q = $(this).parent().siblings(".csc_param_q").text();
    var rsba = $(this).parent().siblings(".csc_param_rsba").text();
    var rsme = $(this).parent().siblings(".csc_param_rsme").text();
    var bame = $(this).parent().siblings(".csc_param_bame").text();

    $("#csc_param_ra").attr("readonly", true);
    $("#csc_param_cnt1").attr("readonly", true);
    $("#csc_param_cnt2").attr("readonly", true);
    $("#csc_param_xnec1").attr("readonly", true);
    $("#csc_param_xnec2").attr("readonly", true);
    $("#csc_param_q").attr("readonly", true);
    $("#csc_param_rsba").attr("readonly", true);
    $("#csc_param_rsme").attr("readonly", true);
    $("#csc_param_bame").attr("readonly", true);
    
    $("#csc_param_ra").val(ra);
    $("#csc_param_cnt1").val(cnt1);
    $("#csc_param_cnt2").val(cnt2);
    $("#csc_param_xnec1").val(xnec1);
    $("#csc_param_xnec2").val(xnec2);
    $("#csc_param_q").val(q);
    $("#csc_param_rsba").val(rsba);
    $("#csc_param_rsme").val(rsme);
    $("#csc_param_bame").val(bame);


    $("#csc_param_confirm_btn").hide();
    $("#csc_param_Modal").show();
  });
  