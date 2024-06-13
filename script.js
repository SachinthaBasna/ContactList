function addContact() {
  // alert("Wada machan")
  var name = document.getElementById("name");
  var mobile = document.getElementById("mobile");
  var email = document.getElementById("email");

  var f = new FormData();

  f.append("n", name.value);
  f.append("e", email.value);
  f.append("p", mobile.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var respo = r.responseText;
      if (respo == "success") {
        alert(respo);
        location.reload();
      } else {
        alert(respo);
      }
    }
  };
  r.open("POST", "addContactProcess.php", true);
  r.send(f);
}

function deleteContact(x) {
  // alert("OK")

  var id = x;
  //   alert(id);

  var f = new FormData();
  f.append("id", id);

  var ok = confirm("are you sure delete this contact?");

  if (ok == true) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4 && r.status == 200) {
        var respo = r.responseText;
        confirm("Contact Deleted");
        location.reload();
      }
    };

    r.open("POST", "deleteContactProcess.php", true);
    r.send(f);
  }
}

function searchContact() {
  // alert("Ok");

  var s = document.getElementById("search");

  var f = new FormData();

  f.append("s", s.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var respo = r.responseText;
      document.getElementById("contact-wrapper").innerHTML = respo;
    }
  };

  r.open("POST", "searchContactProcess.php", true);
  r.send(f);
}

function star(element ,y) {
  var star = y;

  // alert(y);

  var f = new FormData();

  f.append("star", star.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var respo = r.responseText;
      alert("contact added to favourites");
      element.querySelector('i').style.color = "rgb(255, 162, 0)";
    }
  };

  r.open("POST", "favContactProcess.php", true);
  r.send(f);
}
