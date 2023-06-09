Joomla = window.Joomla || {}, Joomla.editors = Joomla.editors || {}, Joomla.editors
  .instances = Joomla.editors.instances || {},
  function(e, t) {
    "use strict";
    e.submitform = function(e, n, o) {
      n || (n = t.getElementById("adminForm")), e && (n.task.value = e), n.noValidate = !
        o, n.setAttribute("novalidate", !o);
      var r = t.createElement("input");
      r.style.display = "none", r.type = "submit", n.appendChild(r).click(),
        n.removeChild(r)
    }, e.submitbutton = function(t) {
      e.submitform(t)
    }, e.JText = {
      strings: {},
      _: function(e, t) {
        return "undefined" != typeof this.strings[e.toUpperCase()] ? this.strings[
          e.toUpperCase()] : t
      },
      load: function(e) {
        for (var t in e) e.hasOwnProperty(t) && (this.strings[t.toUpperCase()] =
          e[t]);
        return this
      }
    }, e.replaceTokens = function(e) {
      if (/^[0-9A-F]{32}$/i.test(e)) {
        var n, o, r, i = t.getElementsByTagName("input");
        for (n = 0, r = i.length; r > n; n++) o = i[n], "hidden" == o.type &&
          "1" == o.value && 32 == o.name.length && (o.name = e)
      }
    }, e.isEmail = function(e) {
      var t = /^[\w.!#$%&‚Äô*+\/=?^`{|}~-]+@[a-z0-9-]+(?:\.[a-z0-9-]{2,})+$/i;
      return t.test(e)
    }, e.checkAll = function(e, t) {
      if (!e.form) return !1;
      t = t ? t : "cb";
      var n, o, r, i = 0;
      for (n = 0, r = e.form.elements.length; r > n; n++) o = e.form.elements[
        n], o.type == e.type && 0 === o.id.indexOf(t) && (o.checked = e.checked,
        i += o.checked ? 1 : 0);
      return e.form.boxchecked && (e.form.boxchecked.value = i), !0
    }, e.renderMessages = function(n) {
      e.removeMessages();
      var o, r, i, a, l, s, d, c, u = t.getElementById(
        "system-message-container");
      for (o in n)
        if (n.hasOwnProperty(o)) {
          r = n[o], i = t.createElement("div"), c = "notice" == o ?
            "alert-info" : "alert-" + o, c = "message" == o ? "alert-success" :
            c, i.className = "alert " + c;
          var f = t.createElement("button");
          for (f.setAttribute("type", "button"), f.setAttribute(
              "data-dismiss", "alert"), f.className = "close", f.innerHTML =
            "×", i.appendChild(f), a = e.JText._(o), "undefined" != typeof a &&
            (l = t.createElement("h4"), l.className = "alert-heading", l.innerHTML =
              e.JText._(o), i.appendChild(l)), s = r.length - 1; s >= 0; s--)
            d = t.createElement("div"), d.innerHTML = r[s], i.appendChild(d);
          u.appendChild(i)
        }
    }, e.removeMessages = function() {
      for (var e = t.getElementById("system-message-container"); e.firstChild;)
        e.removeChild(e.firstChild);
      e.style.display = "none", e.offsetHeight, e.style.display = ""
    }, e.ajaxErrorsMessages = function(t, n) {
      var o = {};
      if ("parsererror" == n) {
        for (var r = t.responseText.trim(), i = [], a = r.length - 1; a >= 0; a--)
          i.unshift(["&#", r[a].charCodeAt(), ";"].join(""));
        r = i.join(""), o.error = [e.JText._("JLIB_JS_AJAX_ERROR_PARSE").replace(
          "%s", r)]
      } else "nocontent" == n ? o.error = [e.JText._(
        "JLIB_JS_AJAX_ERROR_NO_CONTENT")] : "timeout" == n ? o.error = [e.JText
        ._("JLIB_JS_AJAX_ERROR_TIMEOUT")
      ] : "abort" == n ? o.error = [e.JText._(
        "JLIB_JS_AJAX_ERROR_CONNECTION_ABORT")] : o.error = [e.JText._(
        "JLIB_JS_AJAX_ERROR_OTHER").replace("%s", t.status)];
      return o
    }, e.isChecked = function(e, n) {
      if ("undefined" == typeof n && (n = t.getElementById("adminForm")), n.boxchecked
        .value = e ? parseInt(n.boxchecked.value) + 1 : parseInt(n.boxchecked
          .value) - 1, n.elements["checkall-toggle"]) {
        var o, r, i, a = !0;
        for (o = 0, i = n.elements.length; i > o; o++)
          if (r = n.elements[o], "checkbox" == r.type && "checkall-toggle" !=
            r.name && !r.checked) {
            a = !1;
            break
          }
        n.elements["checkall-toggle"].checked = a
      }
    }, e.popupWindow = function(e, t, n, o, r) {
      var i = (screen.width - n) / 2,
        a = (screen.height - o) / 2,
        l = "height=" + o + ",width=" + n + ",top=" + a + ",left=" + i +
        ",scrollbars=" + r + ",resizable";
      window.open(e, t, l).window.focus()
    }, e.tableOrdering = function(n, o, r, i) {
      "undefined" == typeof i && (i = t.getElementById("adminForm")), i.filter_order
        .value = n, i.filter_order_Dir.value = o, e.submitform(r, i)
    }, window.writeDynaList = function(e, n, o, r, i) {
      var a, l, s, d = "<select " + e + ">",
        c = o == r,
        u = 0;
      for (l in n) n.hasOwnProperty(l) && (s = n[l], s[0] == o && (a = "", (c &&
          i == s[1] || !c && 0 === u) && (a = 'selected="selected"'), d +=
        '<option value="' + s[1] + '" ' + a + ">" + s[2] + "</option>", u++
      ));
      d += "</select>", t.writeln(d)
    }, window.changeDynaList = function(e, n, o, r, i) {
      for (var a, l, s, d, c = t.adminForm[e], u = o == r; c.firstChild;) c.removeChild(
        c.firstChild);
      a = 0;
      for (l in n) n.hasOwnProperty(l) && (s = n[l], s[0] == o && (d = new Option,
        d.value = s[1], d.text = s[2], (u && i == d.value || !u && 0 ===
          a) && (d.selected = !0), c.options[a++] = d));
      c.length = a
    }, window.radioGetCheckedValue = function(e) {
      if (!e) return "";
      var t, n = e.length;
      if (void 0 === n) return e.checked ? e.value : "";
      for (t = 0; n > t; t++)
        if (e[t].checked) return e[t].value;
      return ""
    }, window.getSelectedValue = function(e, n) {
      var o = t[e][n],
        r = o.selectedIndex;
      return null !== r && r > -1 ? o.options[r].value : null
    }, window.listItemTask = function(e, n) {
      var o, r = t.adminForm,
        i = 0,
        a = r[e];
      if (!a) return !1;
      for (;;) {
        if (o = r["cb" + i], !o) break;
        o.checked = !1, i++
      }
      return a.checked = !0, r.boxchecked.value = 1, window.submitform(n), !1
    }, window.submitbutton = function(t) {
      e.submitbutton(t)
    }, window.submitform = function(t) {
      e.submitform(t)
    }, window.saveorder = function(e, t) {
      window.checkAll_button(e, t)
    }, window.checkAll_button = function(n, o) {
      o = o ? o : "saveorder";
      var r, i;
      for (r = 0; n >= r; r++) {
        if (i = t.adminForm["cb" + r], !i) return void alert(
          "You cannot change the order of items, as an item in the list is `Checked Out`"
        );
        i.checked = !0
      }
      e.submitform(o)
    }, e.loadingLayer = function(n, o) {
      if (n = n || "show", o = o || t.body, "load" == n) {
        var r = t.getElementsByTagName("body")[0].getAttribute(
            "data-basepath") || "",
          i = t.createElement("div");
        i.id = "loading-logo", i.style.position = "fixed", i.style.top = "0",
          i.style.left = "0", i.style.width = "100%", i.style.height = "100%",
          i.style.opacity = "0.8", i.style.filter = "alpha(opacity=80)", i.style
          .overflow = "hidden", i.style["z-index"] = "10000", i.style.display =
          "none", i.style["background-color"] = "#fff", i.style[
            "background-image"] = 'url("' + r +
          '/media/jui/images/ajax-loader.gif")', i.style[
            "background-position"] = "center", i.style["background-repeat"] =
          "no-repeat", i.style["background-attachment"] = "fixed", o.appendChild(
            i)
      } else t.getElementById("loading-logo") || e.loadingLayer("load", o), t
        .getElementById("loading-logo").style.display = "show" == n ? "block" :
        "none";
      return t.getElementById("loading-logo")
    }
  }(Joomla, document);