$(document).ready(function () {
  $(".footer-callback").DataTable({
    footerCallback: function (row, data, start, end, display) {
      var api = this.api(),
        intVal = function (i) {
          return "string" == typeof i
            ? 1 * i.replace(/(\Rp)|[.]/g /*/[\$,]/g*/, "")
            : "number" == typeof i
            ? i
            : 0;
        };
      (total = api
        .column(4)
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0)),
        (pageTotal = api
          .column(4, { page: "current" })
          .data()
          .reduce(function (a, b) {
            return intVal(a) + intVal(b);
          }, 0)),
        $(api.column(4).footer()).html(
          "Rp." + pageTotal + " ( Rp." + total + " total)"
        );
    },
  });
});
