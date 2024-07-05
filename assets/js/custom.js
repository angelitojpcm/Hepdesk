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
      page.table_users();
    },

    /*====================================================
    FUNCIONES
    ====================================================*/

    login: function (e) {
      const form = $("#loginForm");

      form.submit(function (e) {
        e.preventDefault();

        //Validamos el formulario que los campos no esten vacios
        form.validate({
          rules: {
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
            },
          },
          messages: {
            email: {
              required: "El campo email es requerido",
              email: "El campo email debe ser un correo valido",
            },
            password: {
              required: "El campo contraseña es requerido",
            },
          },
          submitHandler: function (form) {
            const data = $(form).serialize();
            $.ajax({
              url: page._base + "auth/validate",
              type: $(form).attr("method"),
              data: data,
              dataType: "json",
              success: function (response) {
                if (response.status !== 401) {
                  Swal.fire({
                    icon: "success",
                    title: "Bienvenido",
                    text: response.message,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = response.url;
                    }
                  });
                  return;
                }

                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: response.message,
                });
              },
              error: function (response) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Algo salió mal, intenta de nuevo",
                });
              },
            });
          },
        });
      });
    },

    //Curd Users

    table_users: function (e) {
      var table = $("#table_users").DataTable({
        lengthChange: false,
      });
    },
  };

  page.i();
})(window, document, jQuery);
