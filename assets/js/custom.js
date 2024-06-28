(function (window, document, $, undefined) {
  "use strict";

  var page = {
    i: function (e) {
      page.d();
      page.methods();
    },

    d: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html")),
        (this._base = $("base").attr("href"));
    },

    /*====================================================
    DEFINIMOS LOS METODOS
    ====================================================*/
    methods: function (e) {
      page.login();
    },

    /*====================================================
    FUNCIONES
    ====================================================*/

    login: function (e) {
      const form = $("#loginForm");

      //
      form.submit(function (e) {
        e.preventDefault();

        //Accedemos  a los valores de los inputs del form
        const email = $("#email").val();
        const password = $("#password").val();
        const rule = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        //Validar si los campos estan vacios
        if (email === "" || password === "") {
          alert("Todos los campos son obligatorios");
          return;
        }

        //Validar si el email es correcto
        if (!rule.test(email)) {
          alert("El email no es valido");
          return;
        }

        // Ejecutar la peticion

        $.ajax({
          type: "POST",
          url: `${page._base}auth/validate`,
          data: form.serialize(),
          dataType: "json",
          success: function (resp) {
            if (resp.status === 200) {
              alert(resp.message);
              window.location.href = "dashboard";
            } else {
              alert(resp.message);
            }
          },
          error: function (error) {
            console.log(error);
          },
        });
      });
    },
  };

  page.i();
})(window, document, jQuery);
