$("#persons").change(() => {
  $("#price").val(($("#persons").val() * 19.99).toFixed(2));
  if ($("#persons").val() !== "") {
    $("#person").removeClass("hidden");
  } else {
    $("#person").addClass("hidden");
  }
});
if ($("#first_input").val() !== "") {
  $("#first_name").removeClass("hidden");
}
if ($("#last_input").val() !== "") {
  $("#last_name").removeClass("hidden");
}
if ($("#email_input").val() !== "") {
  $("#email").removeClass("hidden");
}
if ($("#persons").val() !== "") {
  $("#person").removeClass("hidden");
  $("#price").val(($("#persons").val() * 19.99).toFixed(2));
}

if ($("#date").val()) {
  $("#date_label").removeClass("border-gray-200").addClass("border-green-400");
}

$("#date").change(() => {
  if ($("#date").val()) {
    $("#date_label")
      .removeClass("border-gray-200")
      .addClass("border-green-400");
  } else {
    $("#date_label")
      .addClass("border-gray-200")
      .removeClass("border-green-400");
  }
});

$("#first_input").change(() => {
  if ($("#first_input").val() !== "") {
    $("#first_name").removeClass("hidden");
  } else {
    $("#first_name").addClass("hidden");
  }
});
$("#last_input").change(() => {
  if ($("#last_input").val() !== "") {
    $("#last_name").removeClass("hidden");
  } else {
    $("#last_name").addClass("hidden");
  }
});
$("#email_input").change(() => {
  if ($("#email_input").val() !== "") {
    $("#email").removeClass("hidden");
  } else {
    $("#email").addClass("hidden");
  }
});
