var Qe, C, yn, wn, fe, Mr, bn, _n, xn, Kt, $t, zt, kn, De = {}, Cn = [], qo = /acit|ex(?:s|g|n|p|$)|rph|grid|ows|mnc|ntw|ine[ch]|zoo|^ord|itera/i, He = Array.isArray;
function Y(t, e) {
  for (var r in e) t[r] = e[r];
  return t;
}
function Wt(t) {
  t && t.parentNode && t.parentNode.removeChild(t);
}
function Q(t, e, r) {
  var n, o, i, a = {};
  for (i in e) i == "key" ? n = e[i] : i == "ref" ? o = e[i] : a[i] = e[i];
  if (arguments.length > 2 && (a.children = arguments.length > 3 ? Qe.call(arguments, 2) : r), typeof t == "function" && t.defaultProps != null) for (i in t.defaultProps) a[i] === void 0 && (a[i] = t.defaultProps[i]);
  return Ie(t, a, n, o, null);
}
function Ie(t, e, r, n, o) {
  var i = { type: t, props: e, key: r, ref: n, __k: null, __: null, __b: 0, __e: null, __c: null, constructor: void 0, __v: o ?? ++yn, __i: -1, __u: 0 };
  return o == null && C.vnode != null && C.vnode(i), i;
}
function Sn() {
  return { current: null };
}
function K(t) {
  return t.children;
}
function Z(t, e) {
  this.props = t, this.context = e;
}
function Ce(t, e) {
  if (e == null) return t.__ ? Ce(t.__, t.__i + 1) : null;
  for (var r; e < t.__k.length; e++) if ((r = t.__k[e]) != null && r.__e != null) return r.__e;
  return typeof t.type == "function" ? Ce(t) : null;
}
function Mn(t) {
  var e, r;
  if ((t = t.__) != null && t.__c != null) {
    for (t.__e = t.__c.base = null, e = 0; e < t.__k.length; e++) if ((r = t.__k[e]) != null && r.__e != null) {
      t.__e = t.__c.base = r.__e;
      break;
    }
    return Mn(t);
  }
}
function It(t) {
  (!t.__d && (t.__d = !0) && fe.push(t) && !at.__r++ || Mr != C.debounceRendering) && ((Mr = C.debounceRendering) || bn)(at);
}
function at() {
  for (var t, e, r, n, o, i, a, s = 1; fe.length; ) fe.length > s && fe.sort(_n), t = fe.shift(), s = fe.length, t.__d && (r = void 0, o = (n = (e = t).__v).__e, i = [], a = [], e.__P && ((r = Y({}, n)).__v = n.__v + 1, C.vnode && C.vnode(r), Gt(e.__P, r, n, e.__n, e.__P.namespaceURI, 32 & n.__u ? [o] : null, i, o ?? Ce(n), !!(32 & n.__u), a), r.__v = n.__v, r.__.__k[r.__i] = r, Nn(i, r, a), r.__e != o && Mn(r)));
  at.__r = 0;
}
function Rn(t, e, r, n, o, i, a, s, l, u, h) {
  var c, p, f, g, y, m, w = n && n.__k || Cn, x = e.length;
  for (l = Lo(r, e, w, l, x), c = 0; c < x; c++) (f = r.__k[c]) != null && (p = f.__i == -1 ? De : w[f.__i] || De, f.__i = c, m = Gt(t, f, p, o, i, a, s, l, u, h), g = f.__e, f.ref && p.ref != f.ref && (p.ref && Zt(p.ref, null, f), h.push(f.ref, f.__c || g, f)), y == null && g != null && (y = g), 4 & f.__u || p.__k === f.__k ? l = Pn(f, l, t) : typeof f.type == "function" && m !== void 0 ? l = m : g && (l = g.nextSibling), f.__u &= -7);
  return r.__e = y, l;
}
function Lo(t, e, r, n, o) {
  var i, a, s, l, u, h = r.length, c = h, p = 0;
  for (t.__k = new Array(o), i = 0; i < o; i++) (a = e[i]) != null && typeof a != "boolean" && typeof a != "function" ? (l = i + p, (a = t.__k[i] = typeof a == "string" || typeof a == "number" || typeof a == "bigint" || a.constructor == String ? Ie(null, a, null, null, null) : He(a) ? Ie(K, { children: a }, null, null, null) : a.constructor == null && a.__b > 0 ? Ie(a.type, a.props, a.key, a.ref ? a.ref : null, a.__v) : a).__ = t, a.__b = t.__b + 1, s = null, (u = a.__i = Qo(a, r, l, c)) != -1 && (c--, (s = r[u]) && (s.__u |= 2)), s == null || s.__v == null ? (u == -1 && (o > h ? p-- : o < h && p++), typeof a.type != "function" && (a.__u |= 4)) : u != l && (u == l - 1 ? p-- : u == l + 1 ? p++ : (u > l ? p-- : p++, a.__u |= 4))) : t.__k[i] = null;
  if (c) for (i = 0; i < h; i++) (s = r[i]) != null && (2 & s.__u) == 0 && (s.__e == n && (n = Ce(s)), En(s, s));
  return n;
}
function Pn(t, e, r) {
  var n, o;
  if (typeof t.type == "function") {
    for (n = t.__k, o = 0; n && o < n.length; o++) n[o] && (n[o].__ = t, e = Pn(n[o], e, r));
    return e;
  }
  t.__e != e && (e && t.type && !r.contains(e) && (e = Ce(t)), r.insertBefore(t.__e, e || null), e = t.__e);
  do
    e = e && e.nextSibling;
  while (e != null && e.nodeType == 8);
  return e;
}
function X(t, e) {
  return e = e || [], t == null || typeof t == "boolean" || (He(t) ? t.some(function(r) {
    X(r, e);
  }) : e.push(t)), e;
}
function Qo(t, e, r, n) {
  var o, i, a = t.key, s = t.type, l = e[r];
  if (l === null && t.key == null || l && a == l.key && s == l.type && (2 & l.__u) == 0) return r;
  if (n > (l != null && (2 & l.__u) == 0 ? 1 : 0)) for (o = r - 1, i = r + 1; o >= 0 || i < e.length; ) {
    if (o >= 0) {
      if ((l = e[o]) && (2 & l.__u) == 0 && a == l.key && s == l.type) return o;
      o--;
    }
    if (i < e.length) {
      if ((l = e[i]) && (2 & l.__u) == 0 && a == l.key && s == l.type) return i;
      i++;
    }
  }
  return -1;
}
function Rr(t, e, r) {
  e[0] == "-" ? t.setProperty(e, r ?? "") : t[e] = r == null ? "" : typeof r != "number" || qo.test(e) ? r : r + "px";
}
function Ye(t, e, r, n, o) {
  var i, a;
  e: if (e == "style") if (typeof r == "string") t.style.cssText = r;
  else {
    if (typeof n == "string" && (t.style.cssText = n = ""), n) for (e in n) r && e in r || Rr(t.style, e, "");
    if (r) for (e in r) n && r[e] == n[e] || Rr(t.style, e, r[e]);
  }
  else if (e[0] == "o" && e[1] == "n") i = e != (e = e.replace(xn, "$1")), a = e.toLowerCase(), e = a in t || e == "onFocusOut" || e == "onFocusIn" ? a.slice(2) : e.slice(2), t.l || (t.l = {}), t.l[e + i] = r, r ? n ? r.u = n.u : (r.u = Kt, t.addEventListener(e, i ? zt : $t, i)) : t.removeEventListener(e, i ? zt : $t, i);
  else {
    if (o == "http://www.w3.org/2000/svg") e = e.replace(/xlink(H|:h)/, "h").replace(/sName$/, "s");
    else if (e != "width" && e != "height" && e != "href" && e != "list" && e != "form" && e != "tabIndex" && e != "download" && e != "rowSpan" && e != "colSpan" && e != "role" && e != "popover" && e in t) try {
      t[e] = r ?? "";
      break e;
    } catch {
    }
    typeof r == "function" || (r == null || r === !1 && e[4] != "-" ? t.removeAttribute(e) : t.setAttribute(e, e == "popover" && r == 1 ? "" : r));
  }
}
function Pr(t) {
  return function(e) {
    if (this.l) {
      var r = this.l[e.type + t];
      if (e.t == null) e.t = Kt++;
      else if (e.t < r.u) return;
      return r(C.event ? C.event(e) : e);
    }
  };
}
function Gt(t, e, r, n, o, i, a, s, l, u) {
  var h, c, p, f, g, y, m, w, x, R, N, z, S, M, v, O, W, U = e.type;
  if (e.constructor != null) return null;
  128 & r.__u && (l = !!(32 & r.__u), i = [s = e.__e = r.__e]), (h = C.__b) && h(e);
  e: if (typeof U == "function") try {
    if (w = e.props, x = "prototype" in U && U.prototype.render, R = (h = U.contextType) && n[h.__c], N = h ? R ? R.props.value : h.__ : n, r.__c ? m = (c = e.__c = r.__c).__ = c.__E : (x ? e.__c = c = new U(w, N) : (e.__c = c = new Z(w, N), c.constructor = U, c.render = Bo), R && R.sub(c), c.props = w, c.state || (c.state = {}), c.context = N, c.__n = n, p = c.__d = !0, c.__h = [], c._sb = []), x && c.__s == null && (c.__s = c.state), x && U.getDerivedStateFromProps != null && (c.__s == c.state && (c.__s = Y({}, c.__s)), Y(c.__s, U.getDerivedStateFromProps(w, c.__s))), f = c.props, g = c.state, c.__v = e, p) x && U.getDerivedStateFromProps == null && c.componentWillMount != null && c.componentWillMount(), x && c.componentDidMount != null && c.__h.push(c.componentDidMount);
    else {
      if (x && U.getDerivedStateFromProps == null && w !== f && c.componentWillReceiveProps != null && c.componentWillReceiveProps(w, N), !c.__e && c.shouldComponentUpdate != null && c.shouldComponentUpdate(w, c.__s, N) === !1 || e.__v == r.__v) {
        for (e.__v != r.__v && (c.props = w, c.state = c.__s, c.__d = !1), e.__e = r.__e, e.__k = r.__k, e.__k.some(function(J) {
          J && (J.__ = e);
        }), z = 0; z < c._sb.length; z++) c.__h.push(c._sb[z]);
        c._sb = [], c.__h.length && a.push(c);
        break e;
      }
      c.componentWillUpdate != null && c.componentWillUpdate(w, c.__s, N), x && c.componentDidUpdate != null && c.__h.push(function() {
        c.componentDidUpdate(f, g, y);
      });
    }
    if (c.context = N, c.props = w, c.__P = t, c.__e = !1, S = C.__r, M = 0, x) {
      for (c.state = c.__s, c.__d = !1, S && S(e), h = c.render(c.props, c.state, c.context), v = 0; v < c._sb.length; v++) c.__h.push(c._sb[v]);
      c._sb = [];
    } else do
      c.__d = !1, S && S(e), h = c.render(c.props, c.state, c.context), c.state = c.__s;
    while (c.__d && ++M < 25);
    c.state = c.__s, c.getChildContext != null && (n = Y(Y({}, n), c.getChildContext())), x && !p && c.getSnapshotBeforeUpdate != null && (y = c.getSnapshotBeforeUpdate(f, g)), O = h, h != null && h.type === K && h.key == null && (O = On(h.props.children)), s = Rn(t, He(O) ? O : [O], e, r, n, o, i, a, s, l, u), c.base = e.__e, e.__u &= -161, c.__h.length && a.push(c), m && (c.__E = c.__ = null);
  } catch (J) {
    if (e.__v = null, l || i != null) if (J.then) {
      for (e.__u |= l ? 160 : 128; s && s.nodeType == 8 && s.nextSibling; ) s = s.nextSibling;
      i[i.indexOf(s)] = null, e.__e = s;
    } else for (W = i.length; W--; ) Wt(i[W]);
    else e.__e = r.__e, e.__k = r.__k;
    C.__e(J, e, r);
  }
  else i == null && e.__v == r.__v ? (e.__k = r.__k, e.__e = r.__e) : s = e.__e = Ho(r.__e, e, r, n, o, i, a, l, u);
  return (h = C.diffed) && h(e), 128 & e.__u ? void 0 : s;
}
function Nn(t, e, r) {
  for (var n = 0; n < r.length; n++) Zt(r[n], r[++n], r[++n]);
  C.__c && C.__c(e, t), t.some(function(o) {
    try {
      t = o.__h, o.__h = [], t.some(function(i) {
        i.call(o);
      });
    } catch (i) {
      C.__e(i, o.__v);
    }
  });
}
function On(t) {
  return typeof t != "object" || t == null || t.__b && t.__b > 0 ? t : He(t) ? t.map(On) : Y({}, t);
}
function Ho(t, e, r, n, o, i, a, s, l) {
  var u, h, c, p, f, g, y, m = r.props, w = e.props, x = e.type;
  if (x == "svg" ? o = "http://www.w3.org/2000/svg" : x == "math" ? o = "http://www.w3.org/1998/Math/MathML" : o || (o = "http://www.w3.org/1999/xhtml"), i != null) {
    for (u = 0; u < i.length; u++) if ((f = i[u]) && "setAttribute" in f == !!x && (x ? f.localName == x : f.nodeType == 3)) {
      t = f, i[u] = null;
      break;
    }
  }
  if (t == null) {
    if (x == null) return document.createTextNode(w);
    t = document.createElementNS(o, x, w.is && w), s && (C.__m && C.__m(e, i), s = !1), i = null;
  }
  if (x == null) m === w || s && t.data == w || (t.data = w);
  else {
    if (i = i && Qe.call(t.childNodes), m = r.props || De, !s && i != null) for (m = {}, u = 0; u < t.attributes.length; u++) m[(f = t.attributes[u]).name] = f.value;
    for (u in m) if (f = m[u], u != "children") {
      if (u == "dangerouslySetInnerHTML") c = f;
      else if (!(u in w)) {
        if (u == "value" && "defaultValue" in w || u == "checked" && "defaultChecked" in w) continue;
        Ye(t, u, null, f, o);
      }
    }
    for (u in w) f = w[u], u == "children" ? p = f : u == "dangerouslySetInnerHTML" ? h = f : u == "value" ? g = f : u == "checked" ? y = f : s && typeof f != "function" || m[u] === f || Ye(t, u, f, m[u], o);
    if (h) s || c && (h.__html == c.__html || h.__html == t.innerHTML) || (t.innerHTML = h.__html), e.__k = [];
    else if (c && (t.innerHTML = ""), Rn(e.type == "template" ? t.content : t, He(p) ? p : [p], e, r, n, x == "foreignObject" ? "http://www.w3.org/1999/xhtml" : o, i, a, i ? i[0] : r.__k && Ce(r, 0), s, l), i != null) for (u = i.length; u--; ) Wt(i[u]);
    s || (u = "value", x == "progress" && g == null ? t.removeAttribute("value") : g != null && (g !== t[u] || x == "progress" && !g || x == "option" && g != m[u]) && Ye(t, u, g, m[u], o), u = "checked", y != null && y != t[u] && Ye(t, u, y, m[u], o));
  }
  return t;
}
function Zt(t, e, r) {
  try {
    if (typeof t == "function") {
      var n = typeof t.__u == "function";
      n && t.__u(), n && e == null || (t.__u = t(e));
    } else t.current = e;
  } catch (o) {
    C.__e(o, r);
  }
}
function En(t, e, r) {
  var n, o;
  if (C.unmount && C.unmount(t), (n = t.ref) && (n.current && n.current != t.__e || Zt(n, null, e)), (n = t.__c) != null) {
    if (n.componentWillUnmount) try {
      n.componentWillUnmount();
    } catch (i) {
      C.__e(i, e);
    }
    n.base = n.__P = null;
  }
  if (n = t.__k) for (o = 0; o < n.length; o++) n[o] && En(n[o], e, r || typeof t.type != "function");
  r || Wt(t.__e), t.__c = t.__ = t.__e = void 0;
}
function Bo(t, e, r) {
  return this.constructor(t, r);
}
function Te(t, e, r) {
  var n, o, i, a;
  e == document && (e = document.documentElement), C.__ && C.__(t, e), o = (n = typeof r == "function") ? null : r && r.__k || e.__k, i = [], a = [], Gt(e, t = (!n && r || e).__k = Q(K, null, [t]), o || De, De, e.namespaceURI, !n && r ? [r] : o ? null : e.firstChild ? Qe.call(e.childNodes) : null, i, !n && r ? r : o ? o.__e : e.firstChild, n, a), Nn(i, t, a);
}
function An(t, e) {
  Te(t, e, An);
}
function Vo(t, e, r) {
  var n, o, i, a, s = Y({}, t.props);
  for (i in t.type && t.type.defaultProps && (a = t.type.defaultProps), e) i == "key" ? n = e[i] : i == "ref" ? o = e[i] : s[i] = e[i] === void 0 && a != null ? a[i] : e[i];
  return arguments.length > 2 && (s.children = arguments.length > 3 ? Qe.call(arguments, 2) : r), Ie(t.type, s, n || t.key, o || t.ref, null);
}
function ve(t) {
  function e(r) {
    var n, o;
    return this.getChildContext || (n = /* @__PURE__ */ new Set(), (o = {})[e.__c] = this, this.getChildContext = function() {
      return o;
    }, this.componentWillUnmount = function() {
      n = null;
    }, this.shouldComponentUpdate = function(i) {
      this.props.value != i.value && n.forEach(function(a) {
        a.__e = !0, It(a);
      });
    }, this.sub = function(i) {
      n.add(i);
      var a = i.componentWillUnmount;
      i.componentWillUnmount = function() {
        n && n.delete(i), a && a.call(i);
      };
    }), r.children;
  }
  return e.__c = "__cC" + kn++, e.__ = t, e.Provider = e.__l = (e.Consumer = function(r, n) {
    return r.children(n);
  }).contextType = e, e;
}
Qe = Cn.slice, C = { __e: function(t, e, r, n) {
  for (var o, i, a; e = e.__; ) if ((o = e.__c) && !o.__) try {
    if ((i = o.constructor) && i.getDerivedStateFromError != null && (o.setState(i.getDerivedStateFromError(t)), a = o.__d), o.componentDidCatch != null && (o.componentDidCatch(t, n || {}), a = o.__d), a) return o.__E = o;
  } catch (s) {
    t = s;
  }
  throw t;
} }, yn = 0, wn = function(t) {
  return t != null && t.constructor == null;
}, Z.prototype.setState = function(t, e) {
  var r;
  r = this.__s != null && this.__s != this.state ? this.__s : this.__s = Y({}, this.state), typeof t == "function" && (t = t(Y({}, r), this.props)), t && Y(r, t), t != null && this.__v && (e && this._sb.push(e), It(this));
}, Z.prototype.forceUpdate = function(t) {
  this.__v && (this.__e = !0, t && this.__h.push(t), It(this));
}, Z.prototype.render = K, fe = [], bn = typeof Promise == "function" ? Promise.prototype.then.bind(Promise.resolve()) : setTimeout, _n = function(t, e) {
  return t.__v.__b - e.__v.__b;
}, at.__r = 0, xn = /(PointerCapture)$|Capture$/i, Kt = 0, $t = Pr(!1), zt = Pr(!0), kn = 0;
var Ko = 0;
function d(t, e, r, n, o, i) {
  e || (e = {});
  var a, s, l = e;
  if ("ref" in l) for (s in l = {}, e) s == "ref" ? a = e[s] : l[s] = e[s];
  var u = { type: t, props: l, key: r, ref: a, __k: null, __: null, __b: 0, __e: null, __c: null, constructor: void 0, __v: --Ko, __i: -1, __u: 0, __source: o, __self: i };
  if (typeof t == "function" && (a = t.defaultProps)) for (s in a) l[s] === void 0 && (l[s] = a[s]);
  return C.vnode && C.vnode(u), u;
}
var oe, $, Ct, Nr, Se = 0, $n = [], I = C, Or = I.__b, Er = I.__r, Ar = I.diffed, $r = I.__c, zr = I.unmount, Ir = I.__;
function me(t, e) {
  I.__h && I.__h($, t, Se || e), Se = 0;
  var r = $.__H || ($.__H = { __: [], __h: [] });
  return t >= r.__.length && r.__.push({}), r.__[t];
}
function H(t) {
  return Se = 1, gt(zn, t);
}
function gt(t, e, r) {
  var n = me(oe++, 2);
  if (n.t = t, !n.__c && (n.__ = [r ? r(e) : zn(void 0, e), function(s) {
    var l = n.__N ? n.__N[0] : n.__[0], u = n.t(l, s);
    l !== u && (n.__N = [u, n.__[1]], n.__c.setState({}));
  }], n.__c = $, !$.__f)) {
    var o = function(s, l, u) {
      if (!n.__c.__H) return !0;
      var h = n.__c.__H.__.filter(function(p) {
        return !!p.__c;
      });
      if (h.every(function(p) {
        return !p.__N;
      })) return !i || i.call(this, s, l, u);
      var c = n.__c.props !== s;
      return h.forEach(function(p) {
        if (p.__N) {
          var f = p.__[0];
          p.__ = p.__N, p.__N = void 0, f !== p.__[0] && (c = !0);
        }
      }), i && i.call(this, s, l, u) || c;
    };
    $.__f = !0;
    var i = $.shouldComponentUpdate, a = $.componentWillUpdate;
    $.componentWillUpdate = function(s, l, u) {
      if (this.__e) {
        var h = i;
        i = void 0, o(s, l, u), i = h;
      }
      a && a.call(this, s, l, u);
    }, $.shouldComponentUpdate = o;
  }
  return n.__N || n.__;
}
function ce(t, e) {
  var r = me(oe++, 3);
  !I.__s && tr(r.__H, e) && (r.__ = t, r.u = e, $.__H.__h.push(r));
}
function Re(t, e) {
  var r = me(oe++, 4);
  !I.__s && tr(r.__H, e) && (r.__ = t, r.u = e, $.__h.push(r));
}
function Jt(t) {
  return Se = 5, ye(function() {
    return { current: t };
  }, []);
}
function Yt(t, e, r) {
  Se = 6, Re(function() {
    if (typeof t == "function") {
      var n = t(e());
      return function() {
        t(null), n && typeof n == "function" && n();
      };
    }
    if (t) return t.current = e(), function() {
      return t.current = null;
    };
  }, r == null ? r : r.concat(t));
}
function ye(t, e) {
  var r = me(oe++, 7);
  return tr(r.__H, e) && (r.__ = t(), r.__H = e, r.__h = t), r.__;
}
function Me(t, e) {
  return Se = 8, ye(function() {
    return t;
  }, e);
}
function j(t) {
  var e = $.context[t.__c], r = me(oe++, 9);
  return r.c = t, e ? (r.__ == null && (r.__ = !0, e.sub($)), e.props.value) : t.__;
}
function Xt(t, e) {
  I.useDebugValue && I.useDebugValue(e ? e(t) : t);
}
function Wo(t) {
  var e = me(oe++, 10), r = H();
  return e.__ = t, $.componentDidCatch || ($.componentDidCatch = function(n, o) {
    e.__ && e.__(n, o), r[1](n);
  }), [r[0], function() {
    r[1](void 0);
  }];
}
function er() {
  var t = me(oe++, 11);
  if (!t.__) {
    for (var e = $.__v; e !== null && !e.__m && e.__ !== null; ) e = e.__;
    var r = e.__m || (e.__m = [0, 0]);
    t.__ = "P" + r[0] + "-" + r[1]++;
  }
  return t.__;
}
function Go() {
  for (var t; t = $n.shift(); ) if (t.__P && t.__H) try {
    t.__H.__h.forEach(ot), t.__H.__h.forEach(Ft), t.__H.__h = [];
  } catch (e) {
    t.__H.__h = [], I.__e(e, t.__v);
  }
}
I.__b = function(t) {
  $ = null, Or && Or(t);
}, I.__ = function(t, e) {
  t && e.__k && e.__k.__m && (t.__m = e.__k.__m), Ir && Ir(t, e);
}, I.__r = function(t) {
  Er && Er(t), oe = 0;
  var e = ($ = t.__c).__H;
  e && (Ct === $ ? (e.__h = [], $.__h = [], e.__.forEach(function(r) {
    r.__N && (r.__ = r.__N), r.u = r.__N = void 0;
  })) : (e.__h.forEach(ot), e.__h.forEach(Ft), e.__h = [], oe = 0)), Ct = $;
}, I.diffed = function(t) {
  Ar && Ar(t);
  var e = t.__c;
  e && e.__H && (e.__H.__h.length && ($n.push(e) !== 1 && Nr === I.requestAnimationFrame || ((Nr = I.requestAnimationFrame) || Zo)(Go)), e.__H.__.forEach(function(r) {
    r.u && (r.__H = r.u), r.u = void 0;
  })), Ct = $ = null;
}, I.__c = function(t, e) {
  e.some(function(r) {
    try {
      r.__h.forEach(ot), r.__h = r.__h.filter(function(n) {
        return !n.__ || Ft(n);
      });
    } catch (n) {
      e.some(function(o) {
        o.__h && (o.__h = []);
      }), e = [], I.__e(n, r.__v);
    }
  }), $r && $r(t, e);
}, I.unmount = function(t) {
  zr && zr(t);
  var e, r = t.__c;
  r && r.__H && (r.__H.__.forEach(function(n) {
    try {
      ot(n);
    } catch (o) {
      e = o;
    }
  }), r.__H = void 0, e && I.__e(e, r.__v));
};
var Fr = typeof requestAnimationFrame == "function";
function Zo(t) {
  var e, r = function() {
    clearTimeout(n), Fr && cancelAnimationFrame(e), setTimeout(t);
  }, n = setTimeout(r, 35);
  Fr && (e = requestAnimationFrame(r));
}
function ot(t) {
  var e = $, r = t.__c;
  typeof r == "function" && (t.__c = void 0, r()), $ = e;
}
function Ft(t) {
  var e = $;
  t.__c = t.__(), $ = e;
}
function tr(t, e) {
  return !t || t.length !== e.length || e.some(function(r, n) {
    return r !== t[n];
  });
}
function zn(t, e) {
  return typeof e == "function" ? e(t) : e;
}
function In(t, e) {
  for (var r in e) t[r] = e[r];
  return t;
}
function jt(t, e) {
  for (var r in t) if (r !== "__source" && !(r in e)) return !0;
  for (var n in e) if (n !== "__source" && t[n] !== e[n]) return !0;
  return !1;
}
function rr(t, e) {
  var r = e(), n = H({ t: { __: r, u: e } }), o = n[0].t, i = n[1];
  return Re(function() {
    o.__ = r, o.u = e, St(o) && i({ t: o });
  }, [t, r, e]), ce(function() {
    return St(o) && i({ t: o }), t(function() {
      St(o) && i({ t: o });
    });
  }, [t]), r;
}
function St(t) {
  var e, r, n = t.u, o = t.__;
  try {
    var i = n();
    return !((e = o) === (r = i) && (e !== 0 || 1 / e == 1 / r) || e != e && r != r);
  } catch {
    return !0;
  }
}
function nr(t) {
  t();
}
function or(t) {
  return t;
}
function ir() {
  return [!1, nr];
}
var ar = Re;
function st(t, e) {
  this.props = t, this.context = e;
}
function Fn(t, e) {
  function r(o) {
    var i = this.props.ref, a = i == o.ref;
    return !a && i && (i.call ? i(null) : i.current = null), e ? !e(this.props, o) || !a : jt(this.props, o);
  }
  function n(o) {
    return this.shouldComponentUpdate = r, Q(t, o);
  }
  return n.displayName = "Memo(" + (t.displayName || t.name) + ")", n.prototype.isReactComponent = !0, n.__f = !0, n;
}
(st.prototype = new Z()).isPureReactComponent = !0, st.prototype.shouldComponentUpdate = function(t, e) {
  return jt(this.props, t) || jt(this.state, e);
};
var jr = C.__b;
C.__b = function(t) {
  t.type && t.type.__f && t.ref && (t.props.ref = t.ref, t.ref = null), jr && jr(t);
};
var Jo = typeof Symbol < "u" && Symbol.for && Symbol.for("react.forward_ref") || 3911;
function vt(t) {
  function e(r) {
    var n = In({}, r);
    return delete n.ref, t(n, r.ref || null);
  }
  return e.$$typeof = Jo, e.render = e, e.prototype.isReactComponent = e.__f = !0, e.displayName = "ForwardRef(" + (t.displayName || t.name) + ")", e;
}
var Dr = function(t, e) {
  return t == null ? null : X(X(t).map(e));
}, ge = { map: Dr, forEach: Dr, count: function(t) {
  return t ? X(t).length : 0;
}, only: function(t) {
  var e = X(t);
  if (e.length !== 1) throw "Children.only";
  return e[0];
}, toArray: X }, Yo = C.__e;
C.__e = function(t, e, r, n) {
  if (t.then) {
    for (var o, i = e; i = i.__; ) if ((o = i.__c) && o.__c) return e.__e == null && (e.__e = r.__e, e.__k = r.__k), o.__c(t, e);
  }
  Yo(t, e, r, n);
};
var Tr = C.unmount;
function jn(t, e, r) {
  return t && (t.__c && t.__c.__H && (t.__c.__H.__.forEach(function(n) {
    typeof n.__c == "function" && n.__c();
  }), t.__c.__H = null), (t = In({}, t)).__c != null && (t.__c.__P === r && (t.__c.__P = e), t.__c.__e = !0, t.__c = null), t.__k = t.__k && t.__k.map(function(n) {
    return jn(n, e, r);
  })), t;
}
function Dn(t, e, r) {
  return t && r && (t.__v = null, t.__k = t.__k && t.__k.map(function(n) {
    return Dn(n, e, r);
  }), t.__c && t.__c.__P === e && (t.__e && r.appendChild(t.__e), t.__c.__e = !0, t.__c.__P = r)), t;
}
function Fe() {
  this.__u = 0, this.o = null, this.__b = null;
}
function Tn(t) {
  var e = t.__.__c;
  return e && e.__a && e.__a(t);
}
function Un(t) {
  var e, r, n;
  function o(i) {
    if (e || (e = t()).then(function(a) {
      r = a.default || a;
    }, function(a) {
      n = a;
    }), n) throw n;
    if (!r) throw e;
    return Q(r, i);
  }
  return o.displayName = "Lazy", o.__f = !0, o;
}
function xe() {
  this.i = null, this.l = null;
}
C.unmount = function(t) {
  var e = t.__c;
  e && e.__R && e.__R(), e && 32 & t.__u && (t.type = null), Tr && Tr(t);
}, (Fe.prototype = new Z()).__c = function(t, e) {
  var r = e.__c, n = this;
  n.o == null && (n.o = []), n.o.push(r);
  var o = Tn(n.__v), i = !1, a = function() {
    i || (i = !0, r.__R = null, o ? o(s) : s());
  };
  r.__R = a;
  var s = function() {
    if (!--n.__u) {
      if (n.state.__a) {
        var l = n.state.__a;
        n.__v.__k[0] = Dn(l, l.__c.__P, l.__c.__O);
      }
      var u;
      for (n.setState({ __a: n.__b = null }); u = n.o.pop(); ) u.forceUpdate();
    }
  };
  n.__u++ || 32 & e.__u || n.setState({ __a: n.__b = n.__v.__k[0] }), t.then(a, a);
}, Fe.prototype.componentWillUnmount = function() {
  this.o = [];
}, Fe.prototype.render = function(t, e) {
  if (this.__b) {
    if (this.__v.__k) {
      var r = document.createElement("div"), n = this.__v.__k[0].__c;
      this.__v.__k[0] = jn(this.__b, r, n.__O = n.__P);
    }
    this.__b = null;
  }
  var o = e.__a && Q(K, null, t.fallback);
  return o && (o.__u &= -33), [Q(K, null, e.__a ? null : t.children), o];
};
var Ur = function(t, e, r) {
  if (++r[1] === r[0] && t.l.delete(e), t.props.revealOrder && (t.props.revealOrder[0] !== "t" || !t.l.size)) for (r = t.i; r; ) {
    for (; r.length > 3; ) r.pop()();
    if (r[1] < r[0]) break;
    t.i = r = r[2];
  }
};
function Xo(t) {
  return this.getChildContext = function() {
    return t.context;
  }, t.children;
}
function ei(t) {
  var e = this, r = t.h;
  if (e.componentWillUnmount = function() {
    Te(null, e.v), e.v = null, e.h = null;
  }, e.h && e.h !== r && e.componentWillUnmount(), !e.v) {
    for (var n = e.__v; n !== null && !n.__m && n.__ !== null; ) n = n.__;
    e.h = r, e.v = { nodeType: 1, parentNode: r, childNodes: [], __k: { __m: n.__m }, contains: function() {
      return !0;
    }, insertBefore: function(o, i) {
      this.childNodes.push(o), e.h.insertBefore(o, i);
    }, removeChild: function(o) {
      this.childNodes.splice(this.childNodes.indexOf(o) >>> 1, 1), e.h.removeChild(o);
    } };
  }
  Te(Q(Xo, { context: e.context }, t.__v), e.v);
}
function qn(t, e) {
  var r = Q(ei, { __v: t, h: e });
  return r.containerInfo = e, r;
}
(xe.prototype = new Z()).__a = function(t) {
  var e = this, r = Tn(e.__v), n = e.l.get(t);
  return n[0]++, function(o) {
    var i = function() {
      e.props.revealOrder ? (n.push(o), Ur(e, t, n)) : o();
    };
    r ? r(i) : i();
  };
}, xe.prototype.render = function(t) {
  this.i = null, this.l = /* @__PURE__ */ new Map();
  var e = X(t.children);
  t.revealOrder && t.revealOrder[0] === "b" && e.reverse();
  for (var r = e.length; r--; ) this.l.set(e[r], this.i = [1, 0, this.i]);
  return t.children;
}, xe.prototype.componentDidUpdate = xe.prototype.componentDidMount = function() {
  var t = this;
  this.l.forEach(function(e, r) {
    Ur(t, r, e);
  });
};
var Ln = typeof Symbol < "u" && Symbol.for && Symbol.for("react.element") || 60103, ti = /^(?:accent|alignment|arabic|baseline|cap|clip(?!PathU)|color|dominant|fill|flood|font|glyph(?!R)|horiz|image(!S)|letter|lighting|marker(?!H|W|U)|overline|paint|pointer|shape|stop|strikethrough|stroke|text(?!L)|transform|underline|unicode|units|v|vector|vert|word|writing|x(?!C))[A-Z]/, ri = /^on(Ani|Tra|Tou|BeforeInp|Compo)/, ni = /[A-Z0-9]/g, oi = typeof document < "u", ii = function(t) {
  return (typeof Symbol < "u" && typeof Symbol() == "symbol" ? /fil|che|rad/ : /fil|che|ra/).test(t);
};
function sr(t, e, r) {
  return e.__k == null && (e.textContent = ""), Te(t, e), typeof r == "function" && r(), t ? t.__c : null;
}
function Qn(t, e, r) {
  return An(t, e), typeof r == "function" && r(), t ? t.__c : null;
}
Z.prototype.isReactComponent = {}, ["componentWillMount", "componentWillReceiveProps", "componentWillUpdate"].forEach(function(t) {
  Object.defineProperty(Z.prototype, t, { configurable: !0, get: function() {
    return this["UNSAFE_" + t];
  }, set: function(e) {
    Object.defineProperty(this, t, { configurable: !0, writable: !0, value: e });
  } });
});
var qr = C.event;
function ai() {
}
function si() {
  return this.cancelBubble;
}
function li() {
  return this.defaultPrevented;
}
C.event = function(t) {
  return qr && (t = qr(t)), t.persist = ai, t.isPropagationStopped = si, t.isDefaultPrevented = li, t.nativeEvent = t;
};
var lr, ci = { enumerable: !1, configurable: !0, get: function() {
  return this.class;
} }, Lr = C.vnode;
C.vnode = function(t) {
  typeof t.type == "string" && function(e) {
    var r = e.props, n = e.type, o = {}, i = n.indexOf("-") === -1;
    for (var a in r) {
      var s = r[a];
      if (!(a === "value" && "defaultValue" in r && s == null || oi && a === "children" && n === "noscript" || a === "class" || a === "className")) {
        var l = a.toLowerCase();
        a === "defaultValue" && "value" in r && r.value == null ? a = "value" : a === "download" && s === !0 ? s = "" : l === "translate" && s === "no" ? s = !1 : l[0] === "o" && l[1] === "n" ? l === "ondoubleclick" ? a = "ondblclick" : l !== "onchange" || n !== "input" && n !== "textarea" || ii(r.type) ? l === "onfocus" ? a = "onfocusin" : l === "onblur" ? a = "onfocusout" : ri.test(a) && (a = l) : l = a = "oninput" : i && ti.test(a) ? a = a.replace(ni, "-$&").toLowerCase() : s === null && (s = void 0), l === "oninput" && o[a = l] && (a = "oninputCapture"), o[a] = s;
      }
    }
    n == "select" && o.multiple && Array.isArray(o.value) && (o.value = X(r.children).forEach(function(u) {
      u.props.selected = o.value.indexOf(u.props.value) != -1;
    })), n == "select" && o.defaultValue != null && (o.value = X(r.children).forEach(function(u) {
      u.props.selected = o.multiple ? o.defaultValue.indexOf(u.props.value) != -1 : o.defaultValue == u.props.value;
    })), r.class && !r.className ? (o.class = r.class, Object.defineProperty(o, "className", ci)) : (r.className && !r.class || r.class && r.className) && (o.class = o.className = r.className), e.props = o;
  }(t), t.$$typeof = Ln, Lr && Lr(t);
};
var Qr = C.__r;
C.__r = function(t) {
  Qr && Qr(t), lr = t.__c;
};
var Hr = C.diffed;
C.diffed = function(t) {
  Hr && Hr(t);
  var e = t.props, r = t.__e;
  r != null && t.type === "textarea" && "value" in e && e.value !== r.value && (r.value = e.value == null ? "" : e.value), lr = null;
};
var Hn = { ReactCurrentDispatcher: { current: { readContext: function(t) {
  return lr.__n[t.__c].props.value;
}, useCallback: Me, useContext: j, useDebugValue: Xt, useDeferredValue: or, useEffect: ce, useId: er, useImperativeHandle: Yt, useInsertionEffect: ar, useLayoutEffect: Re, useMemo: ye, useReducer: gt, useRef: Jt, useState: H, useSyncExternalStore: rr, useTransition: ir } } }, ui = "18.3.1";
function Bn(t) {
  return Q.bind(null, t);
}
function ie(t) {
  return !!t && t.$$typeof === Ln;
}
function Vn(t) {
  return ie(t) && t.type === K;
}
function Kn(t) {
  return !!t && !!t.displayName && (typeof t.displayName == "string" || t.displayName instanceof String) && t.displayName.startsWith("Memo(");
}
function mt(t) {
  return ie(t) ? Vo.apply(null, arguments) : t;
}
function cr(t) {
  return !!t.__k && (Te(null, t), !0);
}
function Wn(t) {
  return t && (t.base || t.nodeType === 1 && t) || null;
}
var Gn = function(t, e) {
  return t(e);
}, Zn = function(t, e) {
  return t(e);
}, Jn = K, Yn = ie, ur = { useState: H, useId: er, useReducer: gt, useEffect: ce, useLayoutEffect: Re, useInsertionEffect: ar, useTransition: ir, useDeferredValue: or, useSyncExternalStore: rr, startTransition: nr, useRef: Jt, useImperativeHandle: Yt, useMemo: ye, useCallback: Me, useContext: j, useDebugValue: Xt, version: "18.3.1", Children: ge, render: sr, hydrate: Qn, unmountComponentAtNode: cr, createPortal: qn, createElement: Q, createContext: ve, createFactory: Bn, cloneElement: mt, createRef: Sn, Fragment: K, isValidElement: ie, isElement: Yn, isFragment: Vn, isMemo: Kn, findDOMNode: Wn, Component: Z, PureComponent: st, memo: Fn, forwardRef: vt, flushSync: Zn, unstable_batchedUpdates: Gn, StrictMode: Jn, Suspense: Fe, SuspenseList: xe, lazy: Un, __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: Hn };
const di = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({ __proto__: null, Children: ge, Component: Z, Fragment: K, PureComponent: st, StrictMode: Jn, Suspense: Fe, SuspenseList: xe, __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: Hn, cloneElement: mt, createContext: ve, createElement: Q, createFactory: Bn, createPortal: qn, createRef: Sn, default: ur, findDOMNode: Wn, flushSync: Zn, forwardRef: vt, hydrate: Qn, isElement: Yn, isFragment: Vn, isMemo: Kn, isValidElement: ie, lazy: Un, memo: Fn, render: sr, startTransition: nr, unmountComponentAtNode: cr, unstable_batchedUpdates: Gn, useCallback: Me, useContext: j, useDebugValue: Xt, useDeferredValue: or, useEffect: ce, useErrorBoundary: Wo, useId: er, useImperativeHandle: Yt, useInsertionEffect: ar, useLayoutEffect: Re, useMemo: ye, useReducer: gt, useRef: Jt, useState: H, useSyncExternalStore: rr, useTransition: ir, version: ui }, Symbol.toStringTag, { value: "Module" }));
function hi(t) {
  return {
    // eslint-disable-next-line
    render: function(e) {
      sr(e, t);
    },
    // eslint-disable-next-line
    unmount: function() {
      cr(t);
    }
  };
}
var fi = Object.defineProperty, pi = (t, e, r) => e in t ? fi(t, e, { enumerable: !0, configurable: !0, writable: !0, value: r }) : t[e] = r, Xe = (t, e, r) => pi(t, typeof e != "symbol" ? e + "" : e, r);
const gi = {
  stringify: (t) => t ? "true" : "false",
  parse: (t) => /^[ty1-9]/i.test(t)
}, vi = {
  stringify: (t) => t.name,
  parse: (t, e, r) => {
    const n = (() => {
      if (typeof window < "u" && t in window)
        return window[t];
      if (typeof global < "u" && t in global)
        return global[t];
    })();
    return typeof n == "function" ? n.bind(r) : void 0;
  }
}, mi = {
  stringify: (t) => JSON.stringify(t),
  parse: (t) => JSON.parse(t)
}, yi = {
  stringify: (t) => `${t}`,
  parse: (t) => parseFloat(t)
}, wi = {
  stringify: (t) => t,
  parse: (t) => t
}, Mt = {
  string: wi,
  number: yi,
  boolean: gi,
  function: vi,
  json: mi
};
function bi(t) {
  return t.replace(
    /([a-z0-9])([A-Z])/g,
    (e, r, n) => `${r}-${n.toLowerCase()}`
  );
}
const et = Symbol.for("r2wc.render"), tt = Symbol.for("r2wc.connected"), de = Symbol.for("r2wc.context"), re = Symbol.for("r2wc.props");
function _i(t, e, r) {
  var n, o, i;
  e.props || (e.props = t.propTypes ? Object.keys(t.propTypes) : []), e.events || (e.events = []);
  const a = Array.isArray(e.props) ? e.props.slice() : Object.keys(e.props), s = Array.isArray(e.events) ? e.events.slice() : Object.keys(e.events), l = {}, u = {}, h = {}, c = {};
  for (const f of a) {
    l[f] = Array.isArray(e.props) ? "string" : e.props[f];
    const g = bi(f);
    h[f] = g, c[g] = f;
  }
  for (const f of s)
    u[f] = Array.isArray(e.events) ? {} : e.events[f];
  class p extends HTMLElement {
    constructor() {
      super(), Xe(this, i, !0), Xe(this, o), Xe(this, n, {}), Xe(this, "container"), e.shadow ? this.container = this.attachShadow({
        mode: e.shadow
      }) : this.container = this, this[re].container = this.container;
      for (const g of a) {
        const y = h[g], m = this.getAttribute(y), w = l[g], x = w ? Mt[w] : null;
        x != null && x.parse && m && (this[re][g] = x.parse(m, y, this));
      }
      for (const g of s)
        this[re][g] = (y) => {
          const m = g.replace(/^on/, "").toLowerCase();
          this.dispatchEvent(
            new CustomEvent(m, { detail: y, ...u[g] })
          );
        };
    }
    static get observedAttributes() {
      return Object.keys(c);
    }
    connectedCallback() {
      this[tt] = !0, this[et]();
    }
    disconnectedCallback() {
      this[tt] = !1, this[de] && r.unmount(this[de]), delete this[de];
    }
    attributeChangedCallback(g, y, m) {
      const w = c[g], x = l[w], R = x ? Mt[x] : null;
      w in l && R != null && R.parse && m && (this[re][w] = R.parse(m, g, this), this[et]());
    }
    [(i = tt, o = de, n = re, et)]() {
      this[tt] && (this[de] ? r.update(this[de], this[re]) : this[de] = r.mount(
        this.container,
        t,
        this[re]
      ));
    }
  }
  for (const f of a) {
    const g = h[f], y = l[f];
    Object.defineProperty(p.prototype, f, {
      enumerable: !0,
      configurable: !0,
      get() {
        return this[re][f];
      },
      set(m) {
        this[re][f] = m;
        const w = y ? Mt[y] : null;
        if (w != null && w.stringify) {
          const x = w.stringify(m, g, this);
          this.getAttribute(g) !== x && this.setAttribute(g, x);
        } else
          this[et]();
      }
    });
  }
  return p;
}
function xi(t, e, r) {
  const n = hi(t), o = ur.createElement(e, r);
  return n.render(o), {
    root: n,
    ReactComponent: e
  };
}
function ki({ root: t, ReactComponent: e }, r) {
  const n = ur.createElement(e, r);
  t.render(n);
}
function Ci({ root: t }) {
  t.unmount();
}
function Si(t, e = {}) {
  return _i(t, e, { mount: xi, update: ki, unmount: Ci });
}
const Mi = `/*! tailwindcss v4.1.10 | MIT License | https://tailwindcss.com */@layer properties{@supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){*,:before,:after,::backdrop{--tw-scale-x:1;--tw-scale-y:1;--tw-scale-z:1;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-y-reverse:0;--tw-space-x-reverse:0;--tw-border-style:solid;--tw-gradient-position:initial;--tw-gradient-from:#0000;--tw-gradient-via:#0000;--tw-gradient-to:#0000;--tw-gradient-stops:initial;--tw-gradient-via-stops:initial;--tw-gradient-from-position:0%;--tw-gradient-via-position:50%;--tw-gradient-to-position:100%;--tw-leading:initial;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-outline-style:solid;--tw-duration:initial;--tw-ease:initial;--tw-animation-delay:0s;--tw-animation-direction:normal;--tw-animation-duration:initial;--tw-animation-fill-mode:none;--tw-animation-iteration-count:1;--tw-enter-opacity:1;--tw-enter-rotate:0;--tw-enter-scale:1;--tw-enter-translate-x:0;--tw-enter-translate-y:0;--tw-exit-opacity:1;--tw-exit-rotate:0;--tw-exit-scale:1;--tw-exit-translate-x:0;--tw-exit-translate-y:0}}}@layer theme{:root,:host{--font-sans:ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-100:oklch(93.6% .032 17.717);--color-red-400:oklch(70.4% .191 22.216);--color-red-500:oklch(63.7% .237 25.331);--color-red-600:oklch(57.7% .245 27.325);--color-red-800:oklch(44.4% .177 26.899);--color-orange-400:oklch(75% .183 55.934);--color-orange-500:oklch(70.5% .213 47.604);--color-orange-600:oklch(64.6% .222 41.116);--color-orange-700:oklch(55.3% .195 38.402);--color-amber-400:oklch(82.8% .189 84.429);--color-amber-500:oklch(76.9% .188 70.08);--color-amber-600:oklch(66.6% .179 58.318);--color-yellow-100:oklch(97.3% .071 103.193);--color-yellow-400:oklch(85.2% .199 91.936);--color-yellow-500:oklch(79.5% .184 86.047);--color-yellow-600:oklch(68.1% .162 75.834);--color-yellow-800:oklch(47.6% .114 61.907);--color-lime-400:oklch(84.1% .238 128.85);--color-lime-500:oklch(76.8% .233 130.85);--color-lime-600:oklch(64.8% .2 131.684);--color-green-100:oklch(96.2% .044 156.743);--color-green-400:oklch(79.2% .209 151.711);--color-green-500:oklch(72.3% .219 149.579);--color-green-600:oklch(62.7% .194 149.214);--color-green-800:oklch(44.8% .119 151.328);--color-emerald-400:oklch(76.5% .177 163.223);--color-emerald-500:oklch(69.6% .17 162.48);--color-emerald-600:oklch(59.6% .145 163.225);--color-teal-400:oklch(77.7% .152 181.912);--color-teal-500:oklch(70.4% .14 182.503);--color-teal-600:oklch(60% .118 184.704);--color-cyan-400:oklch(78.9% .154 211.53);--color-cyan-500:oklch(71.5% .143 215.221);--color-cyan-600:oklch(60.9% .126 221.723);--color-sky-100:oklch(95.1% .026 236.824);--color-sky-400:oklch(74.6% .16 232.661);--color-sky-500:oklch(68.5% .169 237.323);--color-sky-600:oklch(58.8% .158 241.966);--color-blue-400:oklch(70.7% .165 254.624);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-indigo-400:oklch(67.3% .182 276.935);--color-indigo-500:oklch(58.5% .233 277.117);--color-indigo-600:oklch(51.1% .262 276.966);--color-violet-400:oklch(70.2% .183 293.541);--color-violet-500:oklch(60.6% .25 292.717);--color-violet-600:oklch(54.1% .281 293.009);--color-purple-400:oklch(71.4% .203 305.504);--color-purple-500:oklch(62.7% .265 303.9);--color-purple-600:oklch(55.8% .288 302.321);--color-pink-400:oklch(71.8% .202 349.761);--color-pink-500:oklch(65.6% .241 354.308);--color-pink-600:oklch(59.2% .249 .584);--color-rose-400:oklch(71.2% .194 13.428);--color-rose-500:oklch(64.5% .246 16.439);--color-rose-600:oklch(58.6% .253 17.585);--color-slate-100:oklch(96.8% .007 247.896);--color-slate-200:oklch(92.9% .013 255.508);--color-gray-50:oklch(98.5% .002 247.839);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-white:#fff;--spacing:.25rem;--container-md:28rem;--container-4xl:56rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--leading-tight:1.25;--leading-relaxed:1.625;--ease-out:cubic-bezier(0,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1}@supports (not ((-webkit-appearance:-apple-pay-button))) or (contain-intrinsic-size:1px){::placeholder{color:currentColor}@supports (color:color-mix(in lab,red,red)){::placeholder{color:color-mix(in oklab,currentcolor 50%,transparent)}}}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}*{border-color:var(--border);outline-color:var(--ring)}@supports (color:color-mix(in lab,red,red)){*{outline-color:color-mix(in oklab,var(--ring)50%,transparent)}}body{background-color:var(--background);color:var(--foreground)}}@layer components;@layer utilities{.\\@container\\/card-header{container:card-header/inline-size}.absolute{position:absolute}.relative{position:relative}.inset-0{inset:calc(var(--spacing)*0)}.z-10{z-index:10}.z-20{z-index:20}.col-start-2{grid-column-start:2}.row-span-2{grid-row:span 2/span 2}.row-start-1{grid-row-start:1}.mx-auto{margin-inline:auto}.mt-2{margin-top:calc(var(--spacing)*2)}.mr-2{margin-right:calc(var(--spacing)*2)}.mr-4{margin-right:calc(var(--spacing)*4)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.mb-8{margin-bottom:calc(var(--spacing)*8)}.block{display:block}.flex{display:flex}.grid{display:grid}.inline-flex{display:inline-flex}.size-9{width:calc(var(--spacing)*9);height:calc(var(--spacing)*9)}.h-5{height:calc(var(--spacing)*5)}.h-8{height:calc(var(--spacing)*8)}.h-9{height:calc(var(--spacing)*9)}.h-10{height:calc(var(--spacing)*10)}.h-12{height:calc(var(--spacing)*12)}.h-16{height:calc(var(--spacing)*16)}.h-20{height:calc(var(--spacing)*20)}.h-24{height:calc(var(--spacing)*24)}.h-28{height:calc(var(--spacing)*28)}.h-32{height:calc(var(--spacing)*32)}.min-h-screen{min-height:100vh}.w-5{width:calc(var(--spacing)*5)}.w-8{width:calc(var(--spacing)*8)}.w-10{width:calc(var(--spacing)*10)}.w-12{width:calc(var(--spacing)*12)}.w-16{width:calc(var(--spacing)*16)}.w-20{width:calc(var(--spacing)*20)}.w-24{width:calc(var(--spacing)*24)}.w-28{width:calc(var(--spacing)*28)}.w-32{width:calc(var(--spacing)*32)}.w-fit{width:fit-content}.w-full{width:100%}.max-w-4xl{max-width:var(--container-4xl)}.max-w-6xl{max-width:var(--container-6xl)}.max-w-7xl{max-width:var(--container-7xl)}.max-w-md{max-width:var(--container-md)}.min-w-0{min-width:calc(var(--spacing)*0)}.flex-1{flex:1}.shrink-0{flex-shrink:0}.scale-95{--tw-scale-x:95%;--tw-scale-y:95%;--tw-scale-z:95%;scale:var(--tw-scale-x)var(--tw-scale-y)}.scale-110{--tw-scale-x:110%;--tw-scale-y:110%;--tw-scale-z:110%;scale:var(--tw-scale-x)var(--tw-scale-y)}.transform{transform:var(--tw-rotate-x,)var(--tw-rotate-y,)var(--tw-rotate-z,)var(--tw-skew-x,)var(--tw-skew-y,)}.animate-ping{animation:var(--animate-ping)}.animate-pulse{animation:var(--animate-pulse)}.animate-spin{animation:var(--animate-spin)}.cursor-not-allowed{cursor:not-allowed}.cursor-pointer{cursor:pointer}.auto-rows-min{grid-auto-rows:min-content}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.grid-rows-\\[auto_auto\\]{grid-template-rows:auto auto}.flex-col{flex-direction:column}.items-center{align-items:center}.items-start{align-items:flex-start}.justify-between{justify-content:space-between}.justify-center{justify-content:center}.gap-1{gap:calc(var(--spacing)*1)}.gap-1\\.5{gap:calc(var(--spacing)*1.5)}.gap-2{gap:calc(var(--spacing)*2)}.gap-5{gap:calc(var(--spacing)*5)}.gap-6{gap:calc(var(--spacing)*6)}.gap-8{gap:calc(var(--spacing)*8)}:where(.space-y-2>:not(:last-child)){--tw-space-y-reverse:0;margin-block-start:calc(calc(var(--spacing)*2)*var(--tw-space-y-reverse));margin-block-end:calc(calc(var(--spacing)*2)*calc(1 - var(--tw-space-y-reverse)))}:where(.space-y-4>:not(:last-child)){--tw-space-y-reverse:0;margin-block-start:calc(calc(var(--spacing)*4)*var(--tw-space-y-reverse));margin-block-end:calc(calc(var(--spacing)*4)*calc(1 - var(--tw-space-y-reverse)))}:where(.space-y-6>:not(:last-child)){--tw-space-y-reverse:0;margin-block-start:calc(calc(var(--spacing)*6)*var(--tw-space-y-reverse));margin-block-end:calc(calc(var(--spacing)*6)*calc(1 - var(--tw-space-y-reverse)))}:where(.space-y-8>:not(:last-child)){--tw-space-y-reverse:0;margin-block-start:calc(calc(var(--spacing)*8)*var(--tw-space-y-reverse));margin-block-end:calc(calc(var(--spacing)*8)*calc(1 - var(--tw-space-y-reverse)))}:where(.space-y-12>:not(:last-child)){--tw-space-y-reverse:0;margin-block-start:calc(calc(var(--spacing)*12)*var(--tw-space-y-reverse));margin-block-end:calc(calc(var(--spacing)*12)*calc(1 - var(--tw-space-y-reverse)))}:where(.space-x-4>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*4)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*4)*calc(1 - var(--tw-space-x-reverse)))}.self-start{align-self:flex-start}.justify-self-end{justify-self:flex-end}.overflow-hidden{overflow:hidden}.rounded{border-radius:.25rem}.rounded-full{border-radius:3.40282e38px}.rounded-lg{border-radius:var(--radius)}.rounded-md{border-radius:calc(var(--radius) - 2px)}.rounded-xl{border-radius:calc(var(--radius) + 4px)}.border{border-style:var(--tw-border-style);border-width:1px}.border-4{border-style:var(--tw-border-style);border-width:4px}.border-blue-500{border-color:var(--color-blue-500)}.border-input{border-color:var(--input)}.border-orange-500{border-color:var(--color-orange-500)}.border-transparent{border-color:#0000}.border-t-transparent{border-top-color:#0000}.bg-amber-500{background-color:var(--color-amber-500)}.bg-background{background-color:var(--background)}.bg-blue-500{background-color:var(--color-blue-500)}.bg-border{background-color:var(--border)}.bg-card{background-color:var(--card)}.bg-cyan-500{background-color:var(--color-cyan-500)}.bg-destructive{background-color:var(--destructive)}.bg-emerald-500{background-color:var(--color-emerald-500)}.bg-gray-500{background-color:var(--color-gray-500)}.bg-green-100{background-color:var(--color-green-100)}.bg-green-500{background-color:var(--color-green-500)}.bg-indigo-500{background-color:var(--color-indigo-500)}.bg-lime-500{background-color:var(--color-lime-500)}.bg-orange-500{background-color:var(--color-orange-500)}.bg-orange-500\\/30{background-color:#fe6e004d}@supports (color:color-mix(in lab,red,red)){.bg-orange-500\\/30{background-color:color-mix(in oklab,var(--color-orange-500)30%,transparent)}}.bg-pink-500{background-color:var(--color-pink-500)}.bg-primary{background-color:var(--primary)}.bg-purple-500{background-color:var(--color-purple-500)}.bg-red-100{background-color:var(--color-red-100)}.bg-red-500{background-color:var(--color-red-500)}.bg-rose-500{background-color:var(--color-rose-500)}.bg-secondary{background-color:var(--secondary)}.bg-sky-500{background-color:var(--color-sky-500)}.bg-teal-500{background-color:var(--color-teal-500)}.bg-transparent{background-color:#0000}.bg-violet-500{background-color:var(--color-violet-500)}.bg-white{background-color:var(--color-white)}.bg-yellow-100{background-color:var(--color-yellow-100)}.bg-yellow-500{background-color:var(--color-yellow-500)}.bg-gradient-to-br{--tw-gradient-position:to bottom right in oklab;background-image:linear-gradient(var(--tw-gradient-stops))}.from-amber-400{--tw-gradient-from:var(--color-amber-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-blue-400{--tw-gradient-from:var(--color-blue-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-blue-500{--tw-gradient-from:var(--color-blue-500);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-cyan-400{--tw-gradient-from:var(--color-cyan-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-emerald-400{--tw-gradient-from:var(--color-emerald-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-gray-400{--tw-gradient-from:var(--color-gray-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-green-400{--tw-gradient-from:var(--color-green-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-indigo-400{--tw-gradient-from:var(--color-indigo-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-lime-400{--tw-gradient-from:var(--color-lime-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-orange-400{--tw-gradient-from:var(--color-orange-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-pink-400{--tw-gradient-from:var(--color-pink-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-purple-400{--tw-gradient-from:var(--color-purple-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-red-400{--tw-gradient-from:var(--color-red-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-rose-400{--tw-gradient-from:var(--color-rose-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-sky-100{--tw-gradient-from:var(--color-sky-100);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-sky-400{--tw-gradient-from:var(--color-sky-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-slate-100{--tw-gradient-from:var(--color-slate-100);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-teal-400{--tw-gradient-from:var(--color-teal-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-violet-400{--tw-gradient-from:var(--color-violet-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.from-yellow-400{--tw-gradient-from:var(--color-yellow-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-amber-600{--tw-gradient-to:var(--color-amber-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-blue-600{--tw-gradient-to:var(--color-blue-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-cyan-600{--tw-gradient-to:var(--color-cyan-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-emerald-600{--tw-gradient-to:var(--color-emerald-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-gray-600{--tw-gradient-to:var(--color-gray-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-green-600{--tw-gradient-to:var(--color-green-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-indigo-600{--tw-gradient-to:var(--color-indigo-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-lime-600{--tw-gradient-to:var(--color-lime-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-orange-600{--tw-gradient-to:var(--color-orange-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-pink-600{--tw-gradient-to:var(--color-pink-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-purple-600{--tw-gradient-to:var(--color-purple-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-red-600{--tw-gradient-to:var(--color-red-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-rose-600{--tw-gradient-to:var(--color-rose-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-sky-400{--tw-gradient-to:var(--color-sky-400);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-sky-600{--tw-gradient-to:var(--color-sky-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-slate-200{--tw-gradient-to:var(--color-slate-200);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-teal-600{--tw-gradient-to:var(--color-teal-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-violet-600{--tw-gradient-to:var(--color-violet-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.to-yellow-600{--tw-gradient-to:var(--color-yellow-600);--tw-gradient-stops:var(--tw-gradient-via-stops,var(--tw-gradient-position),var(--tw-gradient-from)var(--tw-gradient-from-position),var(--tw-gradient-to)var(--tw-gradient-to-position))}.p-4{padding:calc(var(--spacing)*4)}.p-6{padding:calc(var(--spacing)*6)}.p-8{padding:calc(var(--spacing)*8)}.px-2{padding-inline:calc(var(--spacing)*2)}.px-3{padding-inline:calc(var(--spacing)*3)}.px-4{padding-inline:calc(var(--spacing)*4)}.px-6{padding-inline:calc(var(--spacing)*6)}.py-0\\.5{padding-block:calc(var(--spacing)*.5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-2{padding-block:calc(var(--spacing)*2)}.py-6{padding-block:calc(var(--spacing)*6)}.text-center{text-align:center}.text-right{text-align:right}.text-2xl{font-size:var(--text-2xl);line-height:var(--tw-leading,var(--text-2xl--line-height))}.text-3xl{font-size:var(--text-3xl);line-height:var(--tw-leading,var(--text-3xl--line-height))}.text-4xl{font-size:var(--text-4xl);line-height:var(--tw-leading,var(--text-4xl--line-height))}.text-5xl{font-size:var(--text-5xl);line-height:var(--tw-leading,var(--text-5xl--line-height))}.text-base{font-size:var(--text-base);line-height:var(--tw-leading,var(--text-base--line-height))}.text-lg{font-size:var(--text-lg);line-height:var(--tw-leading,var(--text-lg--line-height))}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-xl{font-size:var(--text-xl);line-height:var(--tw-leading,var(--text-xl--line-height))}.text-xs{font-size:var(--text-xs);line-height:var(--tw-leading,var(--text-xs--line-height))}.leading-none{--tw-leading:1;line-height:1}.leading-relaxed{--tw-leading:var(--leading-relaxed);line-height:var(--leading-relaxed)}.leading-tight{--tw-leading:var(--leading-tight);line-height:var(--leading-tight)}.font-bold{--tw-font-weight:var(--font-weight-bold);font-weight:var(--font-weight-bold)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.font-semibold{--tw-font-weight:var(--font-weight-semibold);font-weight:var(--font-weight-semibold)}.whitespace-nowrap{white-space:nowrap}.text-blue-600{color:var(--color-blue-600)}.text-card-foreground{color:var(--card-foreground)}.text-foreground{color:var(--foreground)}.text-gray-500{color:var(--color-gray-500)}.text-gray-600{color:var(--color-gray-600)}.text-gray-700{color:var(--color-gray-700)}.text-gray-800{color:var(--color-gray-800)}.text-green-600{color:var(--color-green-600)}.text-green-800{color:var(--color-green-800)}.text-muted-foreground{color:var(--muted-foreground)}.text-orange-600{color:var(--color-orange-600)}.text-orange-700{color:var(--color-orange-700)}.text-primary{color:var(--primary)}.text-primary-foreground{color:var(--primary-foreground)}.text-purple-600{color:var(--color-purple-600)}.text-red-800{color:var(--color-red-800)}.text-secondary-foreground{color:var(--secondary-foreground)}.text-teal-600{color:var(--color-teal-600)}.text-white{color:var(--color-white)}.text-yellow-800{color:var(--color-yellow-800)}.underline-offset-4{text-underline-offset:4px}.opacity-5{opacity:.05}.opacity-30{opacity:.3}.opacity-60{opacity:.6}.shadow{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a),0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-inner{--tw-shadow:inset 0 2px 4px 0 var(--tw-shadow-color,#0000000d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-lg{--tw-shadow:0 10px 15px -3px var(--tw-shadow-color,#0000001a),0 4px 6px -4px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-sm{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a),0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-xl{--tw-shadow:0 20px 25px -5px var(--tw-shadow-color,#0000001a),0 8px 10px -6px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-xs{--tw-shadow:0 1px 2px 0 var(--tw-shadow-color,#0000000d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.ring-4{--tw-ring-shadow:var(--tw-ring-inset,)0 0 0 calc(4px + var(--tw-ring-offset-width))var(--tw-ring-color,currentcolor);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.ring-blue-400\\/50{--tw-ring-color:#54a2ff80}@supports (color:color-mix(in lab,red,red)){.ring-blue-400\\/50{--tw-ring-color:color-mix(in oklab,var(--color-blue-400)50%,transparent)}}.ring-orange-400\\/50{--tw-ring-color:#ff8b1a80}@supports (color:color-mix(in lab,red,red)){.ring-orange-400\\/50{--tw-ring-color:color-mix(in oklab,var(--color-orange-400)50%,transparent)}}.outline{outline-style:var(--tw-outline-style);outline-width:1px}.transition-\\[color\\,box-shadow\\]{transition-property:color,box-shadow;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-transform{transition-property:transform,translate,scale,rotate;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.duration-300{--tw-duration:.3s;transition-duration:.3s}.ease-out{--tw-ease:var(--ease-out);transition-timing-function:var(--ease-out)}.outline-none{--tw-outline-style:none;outline-style:none}.select-none{-webkit-user-select:none;user-select:none}.group-data-\\[disabled\\=true\\]\\:pointer-events-none:is(:where(.group)[data-disabled=true] *){pointer-events:none}.group-data-\\[disabled\\=true\\]\\:opacity-50:is(:where(.group)[data-disabled=true] *){opacity:.5}.peer-disabled\\:cursor-not-allowed:is(:where(.peer):disabled~*){cursor:not-allowed}.peer-disabled\\:opacity-50:is(:where(.peer):disabled~*){opacity:.5}.selection\\:bg-primary ::selection{background-color:var(--primary)}.selection\\:bg-primary::selection{background-color:var(--primary)}.selection\\:text-primary-foreground ::selection{color:var(--primary-foreground)}.selection\\:text-primary-foreground::selection{color:var(--primary-foreground)}.file\\:inline-flex::file-selector-button{display:inline-flex}.file\\:h-7::file-selector-button{height:calc(var(--spacing)*7)}.file\\:border-0::file-selector-button{border-style:var(--tw-border-style);border-width:0}.file\\:bg-transparent::file-selector-button{background-color:#0000}.file\\:text-sm::file-selector-button{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.file\\:font-medium::file-selector-button{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.file\\:text-foreground::file-selector-button{color:var(--foreground)}.placeholder\\:text-muted-foreground::placeholder{color:var(--muted-foreground)}@media (hover:hover){.hover\\:scale-105:hover{--tw-scale-x:105%;--tw-scale-y:105%;--tw-scale-z:105%;scale:var(--tw-scale-x)var(--tw-scale-y)}.hover\\:bg-accent:hover{background-color:var(--accent)}.hover\\:bg-destructive\\/90:hover{background-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.hover\\:bg-destructive\\/90:hover{background-color:color-mix(in oklab,var(--destructive)90%,transparent)}}.hover\\:bg-gray-50:hover{background-color:var(--color-gray-50)}.hover\\:bg-primary\\/90:hover{background-color:var(--primary)}@supports (color:color-mix(in lab,red,red)){.hover\\:bg-primary\\/90:hover{background-color:color-mix(in oklab,var(--primary)90%,transparent)}}.hover\\:bg-secondary\\/80:hover{background-color:var(--secondary)}@supports (color:color-mix(in lab,red,red)){.hover\\:bg-secondary\\/80:hover{background-color:color-mix(in oklab,var(--secondary)80%,transparent)}}.hover\\:text-accent-foreground:hover{color:var(--accent-foreground)}.hover\\:underline:hover{text-decoration-line:underline}.hover\\:shadow-2xl:hover{--tw-shadow:0 25px 50px -12px var(--tw-shadow-color,#00000040);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.hover\\:shadow-xl:hover{--tw-shadow:0 20px 25px -5px var(--tw-shadow-color,#0000001a),0 8px 10px -6px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}}.focus-visible\\:border-ring:focus-visible{border-color:var(--ring)}.focus-visible\\:ring-\\[3px\\]:focus-visible{--tw-ring-shadow:var(--tw-ring-inset,)0 0 0 calc(3px + var(--tw-ring-offset-width))var(--tw-ring-color,currentcolor);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.focus-visible\\:ring-destructive\\/20:focus-visible{--tw-ring-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.focus-visible\\:ring-destructive\\/20:focus-visible{--tw-ring-color:color-mix(in oklab,var(--destructive)20%,transparent)}}.focus-visible\\:ring-ring\\/50:focus-visible{--tw-ring-color:var(--ring)}@supports (color:color-mix(in lab,red,red)){.focus-visible\\:ring-ring\\/50:focus-visible{--tw-ring-color:color-mix(in oklab,var(--ring)50%,transparent)}}.active\\:scale-95:active{--tw-scale-x:95%;--tw-scale-y:95%;--tw-scale-z:95%;scale:var(--tw-scale-x)var(--tw-scale-y)}.disabled\\:pointer-events-none:disabled{pointer-events:none}.disabled\\:cursor-not-allowed:disabled{cursor:not-allowed}.disabled\\:opacity-50:disabled{opacity:.5}.has-data-\\[slot\\=card-action\\]\\:grid-cols-\\[1fr_auto\\]:has([data-slot=card-action]){grid-template-columns:1fr auto}.has-\\[\\>svg\\]\\:px-2\\.5:has(>svg){padding-inline:calc(var(--spacing)*2.5)}.has-\\[\\>svg\\]\\:px-3:has(>svg){padding-inline:calc(var(--spacing)*3)}.has-\\[\\>svg\\]\\:px-4:has(>svg){padding-inline:calc(var(--spacing)*4)}.aria-invalid\\:border-destructive[aria-invalid=true]{border-color:var(--destructive)}.aria-invalid\\:ring-destructive\\/20[aria-invalid=true]{--tw-ring-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.aria-invalid\\:ring-destructive\\/20[aria-invalid=true]{--tw-ring-color:color-mix(in oklab,var(--destructive)20%,transparent)}}.data-\\[orientation\\=horizontal\\]\\:h-px[data-orientation=horizontal]{height:1px}.data-\\[orientation\\=horizontal\\]\\:w-full[data-orientation=horizontal]{width:100%}.data-\\[orientation\\=vertical\\]\\:h-full[data-orientation=vertical]{height:100%}.data-\\[orientation\\=vertical\\]\\:w-px[data-orientation=vertical]{width:1px}@media (min-width:48rem){.md\\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.md\\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.md\\:text-5xl{font-size:var(--text-5xl);line-height:var(--tw-leading,var(--text-5xl--line-height))}.md\\:text-6xl{font-size:var(--text-6xl);line-height:var(--tw-leading,var(--text-6xl--line-height))}.md\\:text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.md\\:text-xl{font-size:var(--text-xl);line-height:var(--tw-leading,var(--text-xl--line-height))}}@media (min-width:64rem){.lg\\:w-9\\/12{width:75%}.lg\\:grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.lg\\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.lg\\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.lg\\:grid-cols-8{grid-template-columns:repeat(8,minmax(0,1fr))}}.dark\\:border-input:is(.dark *){border-color:var(--input)}.dark\\:bg-destructive\\/60:is(.dark *){background-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.dark\\:bg-destructive\\/60:is(.dark *){background-color:color-mix(in oklab,var(--destructive)60%,transparent)}}.dark\\:bg-input\\/30:is(.dark *){background-color:var(--input)}@supports (color:color-mix(in lab,red,red)){.dark\\:bg-input\\/30:is(.dark *){background-color:color-mix(in oklab,var(--input)30%,transparent)}}@media (hover:hover){.dark\\:hover\\:bg-accent\\/50:is(.dark *):hover{background-color:var(--accent)}@supports (color:color-mix(in lab,red,red)){.dark\\:hover\\:bg-accent\\/50:is(.dark *):hover{background-color:color-mix(in oklab,var(--accent)50%,transparent)}}.dark\\:hover\\:bg-input\\/50:is(.dark *):hover{background-color:var(--input)}@supports (color:color-mix(in lab,red,red)){.dark\\:hover\\:bg-input\\/50:is(.dark *):hover{background-color:color-mix(in oklab,var(--input)50%,transparent)}}}.dark\\:focus-visible\\:ring-destructive\\/40:is(.dark *):focus-visible{--tw-ring-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.dark\\:focus-visible\\:ring-destructive\\/40:is(.dark *):focus-visible{--tw-ring-color:color-mix(in oklab,var(--destructive)40%,transparent)}}.dark\\:aria-invalid\\:ring-destructive\\/40:is(.dark *)[aria-invalid=true]{--tw-ring-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){.dark\\:aria-invalid\\:ring-destructive\\/40:is(.dark *)[aria-invalid=true]{--tw-ring-color:color-mix(in oklab,var(--destructive)40%,transparent)}}.\\[\\&_svg\\]\\:pointer-events-none svg{pointer-events:none}.\\[\\&_svg\\]\\:shrink-0 svg{flex-shrink:0}.\\[\\&_svg\\:not\\(\\[class\\*\\=\\'size-\\'\\]\\)\\]\\:size-4 svg:not([class*=size-]){width:calc(var(--spacing)*4);height:calc(var(--spacing)*4)}.\\[\\.border-b\\]\\:pb-6.border-b{padding-bottom:calc(var(--spacing)*6)}.\\[\\.border-t\\]\\:pt-6.border-t{padding-top:calc(var(--spacing)*6)}.\\[\\&\\>svg\\]\\:pointer-events-none>svg{pointer-events:none}.\\[\\&\\>svg\\]\\:size-3>svg{width:calc(var(--spacing)*3);height:calc(var(--spacing)*3)}@media (hover:hover){a.\\[a\\&\\]\\:hover\\:bg-accent:hover{background-color:var(--accent)}a.\\[a\\&\\]\\:hover\\:bg-destructive\\/90:hover{background-color:var(--destructive)}@supports (color:color-mix(in lab,red,red)){a.\\[a\\&\\]\\:hover\\:bg-destructive\\/90:hover{background-color:color-mix(in oklab,var(--destructive)90%,transparent)}}a.\\[a\\&\\]\\:hover\\:bg-primary\\/90:hover{background-color:var(--primary)}@supports (color:color-mix(in lab,red,red)){a.\\[a\\&\\]\\:hover\\:bg-primary\\/90:hover{background-color:color-mix(in oklab,var(--primary)90%,transparent)}}a.\\[a\\&\\]\\:hover\\:bg-secondary\\/90:hover{background-color:var(--secondary)}@supports (color:color-mix(in lab,red,red)){a.\\[a\\&\\]\\:hover\\:bg-secondary\\/90:hover{background-color:color-mix(in oklab,var(--secondary)90%,transparent)}}a.\\[a\\&\\]\\:hover\\:text-accent-foreground:hover{color:var(--accent-foreground)}}.animate-fade-in{animation:.6s ease-out fadeIn}.animate-fade-in-up{animation:.6s ease-out both fadeInUp}.animate-slide-in{animation:.3s ease-out slideIn}.animate-pulse-slow{animation:2s ease-in-out infinite pulseSlow}.animate-bounce-subtle{animation:2s ease-in-out infinite bounceSubtle}.animate-loading-pulse{animation:1.5s ease-in-out infinite loadingPulse}}@property --tw-animation-delay{syntax:"*";inherits:false;initial-value:0s}@property --tw-animation-direction{syntax:"*";inherits:false;initial-value:normal}@property --tw-animation-duration{syntax:"*";inherits:false}@property --tw-animation-fill-mode{syntax:"*";inherits:false;initial-value:none}@property --tw-animation-iteration-count{syntax:"*";inherits:false;initial-value:1}@property --tw-enter-opacity{syntax:"*";inherits:false;initial-value:1}@property --tw-enter-rotate{syntax:"*";inherits:false;initial-value:0}@property --tw-enter-scale{syntax:"*";inherits:false;initial-value:1}@property --tw-enter-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-enter-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-exit-opacity{syntax:"*";inherits:false;initial-value:1}@property --tw-exit-rotate{syntax:"*";inherits:false;initial-value:0}@property --tw-exit-scale{syntax:"*";inherits:false;initial-value:1}@property --tw-exit-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-exit-translate-y{syntax:"*";inherits:false;initial-value:0}:host{--tw-border-style:solid;--tw-leading:initial;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-outline-style:solid;--tw-animation-delay:0s;--tw-animation-direction:normal;--tw-animation-duration:initial;--tw-animation-fill-mode:none;--tw-animation-iteration-count:1;--tw-enter-opacity:1;--tw-enter-rotate:0;--tw-enter-scale:1;--tw-enter-translate-x:0;--tw-enter-translate-y:0;--tw-exit-opacity:1;--tw-exit-rotate:0;--tw-exit-scale:1;--tw-exit-translate-x:0;--tw-exit-translate-y:0;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:transparent var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to);--tw-bg-opacity:1;--tw-border-opacity:1;--tw-text-opacity:1;--radius:.625rem;--background:oklch(100% 0 0);--foreground:oklch(14.5% 0 0);--card:oklch(100% 0 0);--card-foreground:oklch(14.5% 0 0);--popover:oklch(100% 0 0);--popover-foreground:oklch(14.5% 0 0);--primary:oklch(20.5% 0 0);--primary-foreground:oklch(98.5% 0 0);--secondary:oklch(97% 0 0);--secondary-foreground:oklch(20.5% 0 0);--muted:oklch(97% 0 0);--muted-foreground:oklch(55.6% 0 0);--accent:oklch(97% 0 0);--accent-foreground:oklch(20.5% 0 0);--destructive:oklch(57.7% .245 27.325);--border:oklch(92.2% 0 0);--input:oklch(92.2% 0 0);--ring:oklch(70.8% 0 0);--chart-1:oklch(64.6% .222 41.116);--chart-2:oklch(60% .118 184.704);--chart-3:oklch(39.8% .07 227.392);--chart-4:oklch(82.8% .189 84.429);--chart-5:oklch(76.9% .188 70.08);--sidebar:oklch(98.5% 0 0);--sidebar-foreground:oklch(14.5% 0 0);--sidebar-primary:oklch(20.5% 0 0);--sidebar-primary-foreground:oklch(98.5% 0 0);--sidebar-accent:oklch(97% 0 0);--sidebar-accent-foreground:oklch(20.5% 0 0);--sidebar-border:oklch(92.2% 0 0);--sidebar-ring:oklch(70.8% 0 0)}:host(.dark){--background:oklch(14.5% 0 0);--foreground:oklch(98.5% 0 0);--card:oklch(20.5% 0 0);--card-foreground:oklch(98.5% 0 0);--popover:oklch(20.5% 0 0);--popover-foreground:oklch(98.5% 0 0);--primary:oklch(92.2% 0 0);--primary-foreground:oklch(20.5% 0 0);--secondary:oklch(26.9% 0 0);--secondary-foreground:oklch(98.5% 0 0);--muted:oklch(26.9% 0 0);--muted-foreground:oklch(70.8% 0 0);--accent:oklch(26.9% 0 0);--accent-foreground:oklch(98.5% 0 0);--destructive:oklch(70.4% .191 22.216);--border:oklch(100% 0 0/.1);--input:oklch(100% 0 0/.15);--ring:oklch(55.6% 0 0);--chart-1:oklch(48.8% .243 264.376);--chart-2:oklch(69.6% .17 162.48);--chart-3:oklch(76.9% .188 70.08);--chart-4:oklch(62.7% .265 303.9);--chart-5:oklch(64.5% .246 16.439);--sidebar:oklch(20.5% 0 0);--sidebar-foreground:oklch(98.5% 0 0);--sidebar-primary:oklch(48.8% .243 264.376);--sidebar-primary-foreground:oklch(98.5% 0 0);--sidebar-accent:oklch(26.9% 0 0);--sidebar-accent-foreground:oklch(98.5% 0 0);--sidebar-border:oklch(100% 0 0/.1);--sidebar-ring:oklch(55.6% 0 0)}@keyframes fadeIn{0%{opacity:0}to{opacity:1}}@keyframes fadeInUp{0%{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}@keyframes slideIn{0%{opacity:0;transform:translate(100%)}to{opacity:1;transform:translate(0)}}@keyframes pulseSlow{0%,to{transform:scale(1)}50%{transform:scale(1.05)}}@keyframes bounceSubtle{0%,to{transform:translateY(0)}50%{transform:translateY(-2px)}}@keyframes loadingPulse{0%,to{opacity:1}50%{opacity:.5}}@property --tw-scale-x{syntax:"*";inherits:false;initial-value:1}@property --tw-scale-y{syntax:"*";inherits:false;initial-value:1}@property --tw-scale-z{syntax:"*";inherits:false;initial-value:1}@property --tw-rotate-x{syntax:"*";inherits:false}@property --tw-rotate-y{syntax:"*";inherits:false}@property --tw-rotate-z{syntax:"*";inherits:false}@property --tw-skew-x{syntax:"*";inherits:false}@property --tw-skew-y{syntax:"*";inherits:false}@property --tw-space-y-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-gradient-position{syntax:"*";inherits:false}@property --tw-gradient-from{syntax:"<color>";inherits:false;initial-value:#0000}@property --tw-gradient-via{syntax:"<color>";inherits:false;initial-value:#0000}@property --tw-gradient-to{syntax:"<color>";inherits:false;initial-value:#0000}@property --tw-gradient-stops{syntax:"*";inherits:false}@property --tw-gradient-via-stops{syntax:"*";inherits:false}@property --tw-gradient-from-position{syntax:"<length-percentage>";inherits:false;initial-value:0%}@property --tw-gradient-via-position{syntax:"<length-percentage>";inherits:false;initial-value:50%}@property --tw-gradient-to-position{syntax:"<length-percentage>";inherits:false;initial-value:100%}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-outline-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-duration{syntax:"*";inherits:false}@property --tw-ease{syntax:"*";inherits:false}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}`;
var Ri = Symbol.for("preact-signals");
function yt() {
  if (le > 1)
    le--;
  else {
    for (var t, e = !1; je !== void 0; ) {
      var r = je;
      for (je = void 0, Dt++; r !== void 0; ) {
        var n = r.o;
        if (r.o = void 0, r.f &= -3, !(8 & r.f) && to(r)) try {
          r.c();
        } catch (o) {
          e || (t = o, e = !0);
        }
        r = n;
      }
    }
    if (Dt = 0, le--, e) throw t;
  }
}
function Pi(t) {
  if (le > 0) return t();
  le++;
  try {
    return t();
  } finally {
    yt();
  }
}
var E = void 0;
function Xn(t) {
  var e = E;
  E = void 0;
  try {
    return t();
  } finally {
    E = e;
  }
}
var je = void 0, le = 0, Dt = 0, lt = 0;
function eo(t) {
  if (E !== void 0) {
    var e = t.n;
    if (e === void 0 || e.t !== E)
      return e = { i: 0, S: t, p: E.s, n: void 0, t: E, e: void 0, x: void 0, r: e }, E.s !== void 0 && (E.s.n = e), E.s = e, t.n = e, 32 & E.f && t.S(e), e;
    if (e.i === -1)
      return e.i = 0, e.n !== void 0 && (e.n.p = e.p, e.p !== void 0 && (e.p.n = e.n), e.p = E.s, e.n = void 0, E.s.n = e, E.s = e), e;
  }
}
function q(t, e) {
  this.v = t, this.i = 0, this.n = void 0, this.t = void 0, this.W = e == null ? void 0 : e.watched, this.Z = e == null ? void 0 : e.unwatched;
}
q.prototype.brand = Ri;
q.prototype.h = function() {
  return !0;
};
q.prototype.S = function(t) {
  var e = this, r = this.t;
  r !== t && t.e === void 0 && (t.x = r, this.t = t, r !== void 0 ? r.e = t : Xn(function() {
    var n;
    (n = e.W) == null || n.call(e);
  }));
};
q.prototype.U = function(t) {
  var e = this;
  if (this.t !== void 0) {
    var r = t.e, n = t.x;
    r !== void 0 && (r.x = n, t.e = void 0), n !== void 0 && (n.e = r, t.x = void 0), t === this.t && (this.t = n, n === void 0 && Xn(function() {
      var o;
      (o = e.Z) == null || o.call(e);
    }));
  }
};
q.prototype.subscribe = function(t) {
  var e = this;
  return Be(function() {
    var r = e.value, n = E;
    E = void 0;
    try {
      t(r);
    } finally {
      E = n;
    }
  });
};
q.prototype.valueOf = function() {
  return this.value;
};
q.prototype.toString = function() {
  return this.value + "";
};
q.prototype.toJSON = function() {
  return this.value;
};
q.prototype.peek = function() {
  var t = E;
  E = void 0;
  try {
    return this.value;
  } finally {
    E = t;
  }
};
Object.defineProperty(q.prototype, "value", { get: function() {
  var t = eo(this);
  return t !== void 0 && (t.i = this.i), this.v;
}, set: function(t) {
  if (t !== this.v) {
    if (Dt > 100) throw new Error("Cycle detected");
    this.v = t, this.i++, lt++, le++;
    try {
      for (var e = this.t; e !== void 0; e = e.x) e.t.N();
    } finally {
      yt();
    }
  }
} });
function ke(t, e) {
  return new q(t, e);
}
function to(t) {
  for (var e = t.s; e !== void 0; e = e.n) if (e.S.i !== e.i || !e.S.h() || e.S.i !== e.i) return !0;
  return !1;
}
function ro(t) {
  for (var e = t.s; e !== void 0; e = e.n) {
    var r = e.S.n;
    if (r !== void 0 && (e.r = r), e.S.n = e, e.i = -1, e.n === void 0) {
      t.s = e;
      break;
    }
  }
}
function no(t) {
  for (var e = t.s, r = void 0; e !== void 0; ) {
    var n = e.p;
    e.i === -1 ? (e.S.U(e), n !== void 0 && (n.n = e.n), e.n !== void 0 && (e.n.p = n)) : r = e, e.S.n = e.r, e.r !== void 0 && (e.r = void 0), e = n;
  }
  t.s = r;
}
function we(t, e) {
  q.call(this, void 0), this.x = t, this.s = void 0, this.g = lt - 1, this.f = 4, this.W = e == null ? void 0 : e.watched, this.Z = e == null ? void 0 : e.unwatched;
}
we.prototype = new q();
we.prototype.h = function() {
  if (this.f &= -3, 1 & this.f) return !1;
  if ((36 & this.f) == 32 || (this.f &= -5, this.g === lt)) return !0;
  if (this.g = lt, this.f |= 1, this.i > 0 && !to(this))
    return this.f &= -2, !0;
  var t = E;
  try {
    ro(this), E = this;
    var e = this.x();
    (16 & this.f || this.v !== e || this.i === 0) && (this.v = e, this.f &= -17, this.i++);
  } catch (r) {
    this.v = r, this.f |= 16, this.i++;
  }
  return E = t, no(this), this.f &= -2, !0;
};
we.prototype.S = function(t) {
  if (this.t === void 0) {
    this.f |= 36;
    for (var e = this.s; e !== void 0; e = e.n) e.S.S(e);
  }
  q.prototype.S.call(this, t);
};
we.prototype.U = function(t) {
  if (this.t !== void 0 && (q.prototype.U.call(this, t), this.t === void 0)) {
    this.f &= -33;
    for (var e = this.s; e !== void 0; e = e.n) e.S.U(e);
  }
};
we.prototype.N = function() {
  if (!(2 & this.f)) {
    this.f |= 6;
    for (var t = this.t; t !== void 0; t = t.x) t.t.N();
  }
};
Object.defineProperty(we.prototype, "value", { get: function() {
  if (1 & this.f) throw new Error("Cycle detected");
  var t = eo(this);
  if (this.h(), t !== void 0 && (t.i = this.i), 16 & this.f) throw this.v;
  return this.v;
} });
function Br(t, e) {
  return new we(t, e);
}
function oo(t) {
  var e = t.u;
  if (t.u = void 0, typeof e == "function") {
    le++;
    var r = E;
    E = void 0;
    try {
      e();
    } catch (n) {
      throw t.f &= -2, t.f |= 8, dr(t), n;
    } finally {
      E = r, yt();
    }
  }
}
function dr(t) {
  for (var e = t.s; e !== void 0; e = e.n) e.S.U(e);
  t.x = void 0, t.s = void 0, oo(t);
}
function Ni(t) {
  if (E !== this) throw new Error("Out-of-order effect");
  no(this), E = t, this.f &= -2, 8 & this.f && dr(this), yt();
}
function Pe(t) {
  this.x = t, this.u = void 0, this.s = void 0, this.o = void 0, this.f = 32;
}
Pe.prototype.c = function() {
  var t = this.S();
  try {
    if (8 & this.f || this.x === void 0) return;
    var e = this.x();
    typeof e == "function" && (this.u = e);
  } finally {
    t();
  }
};
Pe.prototype.S = function() {
  if (1 & this.f) throw new Error("Cycle detected");
  this.f |= 1, this.f &= -9, oo(this), ro(this), le++;
  var t = E;
  return E = this, Ni.bind(this, t);
};
Pe.prototype.N = function() {
  2 & this.f || (this.f |= 2, this.o = je, je = this);
};
Pe.prototype.d = function() {
  this.f |= 8, 1 & this.f || dr(this);
};
Pe.prototype.dispose = function() {
  this.d();
};
function Be(t) {
  var e = new Pe(t);
  try {
    e.c();
  } catch (r) {
    throw e.d(), r;
  }
  return e.d.bind(e);
}
var io, Rt, ao = [];
Be(function() {
  io = this.N;
})();
function Ne(t, e) {
  C[t] = e.bind(null, C[t] || function() {
  });
}
function ct(t) {
  Rt && Rt(), Rt = t && t.S();
}
function so(t) {
  var e = this, r = t.data, n = Ei(r);
  n.value = r;
  var o = ye(function() {
    for (var s = e, l = e.__v; l = l.__; ) if (l.__c) {
      l.__c.__$f |= 4;
      break;
    }
    var u = Br(function() {
      var f = n.value.value;
      return f === 0 ? 0 : f === !0 ? "" : f || "";
    }), h = Br(function() {
      return !Array.isArray(u.value) && !wn(u.value);
    }), c = Be(function() {
      if (this.N = lo, h.value) {
        var f = u.value;
        s.__v && s.__v.__e && s.__v.__e.nodeType === 3 && (s.__v.__e.data = f);
      }
    }), p = e.__$u.d;
    return e.__$u.d = function() {
      c(), p.call(this);
    }, [h, u];
  }, []), i = o[0], a = o[1];
  return i.value ? a.peek() : a.value;
}
so.displayName = "_st";
Object.defineProperties(q.prototype, { constructor: { configurable: !0, value: void 0 }, type: { configurable: !0, value: so }, props: { configurable: !0, get: function() {
  return { data: this };
} }, __b: { configurable: !0, value: 1 } });
Ne("__b", function(t, e) {
  if (typeof e.type == "string") {
    var r, n = e.props;
    for (var o in n) if (o !== "children") {
      var i = n[o];
      i instanceof q && (r || (e.__np = r = {}), r[o] = i, n[o] = i.peek());
    }
  }
  t(e);
});
Ne("__r", function(t, e) {
  if (e.type !== K) {
    ct();
    var r, n = e.__c;
    n && (n.__$f &= -2, (r = n.__$u) === void 0 && (n.__$u = r = function(o) {
      var i;
      return Be(function() {
        i = this;
      }), i.c = function() {
        n.__$f |= 1, n.setState({});
      }, i;
    }())), ct(r);
  }
  t(e);
});
Ne("__e", function(t, e, r, n) {
  ct(), t(e, r, n);
});
Ne("diffed", function(t, e) {
  ct();
  var r;
  if (typeof e.type == "string" && (r = e.__e)) {
    var n = e.__np, o = e.props;
    if (n) {
      var i = r.U;
      if (i) for (var a in i) {
        var s = i[a];
        s !== void 0 && !(a in n) && (s.d(), i[a] = void 0);
      }
      else
        i = {}, r.U = i;
      for (var l in n) {
        var u = i[l], h = n[l];
        u === void 0 ? (u = Oi(r, l, h, o), i[l] = u) : u.o(h, o);
      }
    }
  }
  t(e);
});
function Oi(t, e, r, n) {
  var o = e in t && t.ownerSVGElement === void 0, i = ke(r);
  return { o: function(a, s) {
    i.value = a, n = s;
  }, d: Be(function() {
    this.N = lo;
    var a = i.value.value;
    n[e] !== a && (n[e] = a, o ? t[e] = a : a ? t.setAttribute(e, a) : t.removeAttribute(e));
  }) };
}
Ne("unmount", function(t, e) {
  if (typeof e.type == "string") {
    var r = e.__e;
    if (r) {
      var n = r.U;
      if (n) {
        r.U = void 0;
        for (var o in n) {
          var i = n[o];
          i && i.d();
        }
      }
    }
  } else {
    var a = e.__c;
    if (a) {
      var s = a.__$u;
      s && (a.__$u = void 0, s.d());
    }
  }
  t(e);
});
Ne("__h", function(t, e, r, n) {
  (n < 3 || n === 9) && (e.__$f |= 2), t(e, r, n);
});
Z.prototype.shouldComponentUpdate = function(t, e) {
  var r = this.__$u, n = r && r.s !== void 0;
  for (var o in e) return !0;
  if (this.__f || typeof this.u == "boolean" && this.u === !0) {
    var i = 2 & this.__$f;
    if (!(n || i || 4 & this.__$f) || 1 & this.__$f) return !0;
  } else if (!(n || 4 & this.__$f) || 3 & this.__$f) return !0;
  for (var a in t) if (a !== "__source" && t[a] !== this.props[a]) return !0;
  for (var s in this.props) if (!(s in t)) return !0;
  return !1;
};
function Ei(t, e) {
  return ye(function() {
    return ke(t, e);
  }, []);
}
var Ai = function(t) {
  queueMicrotask(function() {
    queueMicrotask(t);
  });
};
function $i() {
  Pi(function() {
    for (var t; t = ao.shift(); ) io.call(t);
  });
}
function lo() {
  ao.push(this) === 1 && (C.requestAnimationFrame || Ai)($i);
}
const B = ve(null), zi = () => {
  const t = ke("initial"), e = ke("http://localhost/simrs"), r = ke(null), n = ke("Asuransi");
  return { currentView: t, baseUrl: e, poliklinik: r, usia: n };
};
class Oe {
  constructor() {
    this.listeners = /* @__PURE__ */ new Set(), this.subscribe = this.subscribe.bind(this);
  }
  subscribe(e) {
    const r = {
      listener: e
    };
    return this.listeners.add(r), this.onSubscribe(), () => {
      this.listeners.delete(r), this.onUnsubscribe();
    };
  }
  hasListeners() {
    return this.listeners.size > 0;
  }
  onSubscribe() {
  }
  onUnsubscribe() {
  }
}
const Ue = typeof window > "u" || "Deno" in window;
function G() {
}
function Ii(t, e) {
  return typeof t == "function" ? t(e) : t;
}
function Tt(t) {
  return typeof t == "number" && t >= 0 && t !== 1 / 0;
}
function co(t, e) {
  return Math.max(t + (e || 0) - Date.now(), 0);
}
function ze(t, e, r) {
  return Ve(t) ? typeof e == "function" ? {
    ...r,
    queryKey: t,
    queryFn: e
  } : {
    ...e,
    queryKey: t
  } : t;
}
function Fi(t, e, r) {
  return Ve(t) ? {
    ...e,
    mutationKey: t
  } : typeof t == "function" ? {
    ...e,
    mutationFn: t
  } : {
    ...t
  };
}
function se(t, e, r) {
  return Ve(t) ? [{
    ...e,
    queryKey: t
  }, r] : [t || {}, e];
}
function Vr(t, e) {
  const {
    type: r = "all",
    exact: n,
    fetchStatus: o,
    predicate: i,
    queryKey: a,
    stale: s
  } = t;
  if (Ve(a)) {
    if (n) {
      if (e.queryHash !== hr(a, e.options))
        return !1;
    } else if (!ut(e.queryKey, a))
      return !1;
  }
  if (r !== "all") {
    const l = e.isActive();
    if (r === "active" && !l || r === "inactive" && l)
      return !1;
  }
  return !(typeof s == "boolean" && e.isStale() !== s || typeof o < "u" && o !== e.state.fetchStatus || i && !i(e));
}
function Kr(t, e) {
  const {
    exact: r,
    fetching: n,
    predicate: o,
    mutationKey: i
  } = t;
  if (Ve(i)) {
    if (!e.options.mutationKey)
      return !1;
    if (r) {
      if (pe(e.options.mutationKey) !== pe(i))
        return !1;
    } else if (!ut(e.options.mutationKey, i))
      return !1;
  }
  return !(typeof n == "boolean" && e.state.status === "loading" !== n || o && !o(e));
}
function hr(t, e) {
  return ((e == null ? void 0 : e.queryKeyHashFn) || pe)(t);
}
function pe(t) {
  return JSON.stringify(t, (e, r) => Ut(r) ? Object.keys(r).sort().reduce((n, o) => (n[o] = r[o], n), {}) : r);
}
function ut(t, e) {
  return uo(t, e);
}
function uo(t, e) {
  return t === e ? !0 : typeof t != typeof e ? !1 : t && e && typeof t == "object" && typeof e == "object" ? !Object.keys(e).some((r) => !uo(t[r], e[r])) : !1;
}
function ho(t, e) {
  if (t === e)
    return t;
  const r = Wr(t) && Wr(e);
  if (r || Ut(t) && Ut(e)) {
    const n = r ? t.length : Object.keys(t).length, o = r ? e : Object.keys(e), i = o.length, a = r ? [] : {};
    let s = 0;
    for (let l = 0; l < i; l++) {
      const u = r ? l : o[l];
      a[u] = ho(t[u], e[u]), a[u] === t[u] && s++;
    }
    return n === i && s === n ? t : a;
  }
  return e;
}
function dt(t, e) {
  if (t && !e || e && !t)
    return !1;
  for (const r in t)
    if (t[r] !== e[r])
      return !1;
  return !0;
}
function Wr(t) {
  return Array.isArray(t) && t.length === Object.keys(t).length;
}
function Ut(t) {
  if (!Gr(t))
    return !1;
  const e = t.constructor;
  if (typeof e > "u")
    return !0;
  const r = e.prototype;
  return !(!Gr(r) || !r.hasOwnProperty("isPrototypeOf"));
}
function Gr(t) {
  return Object.prototype.toString.call(t) === "[object Object]";
}
function Ve(t) {
  return Array.isArray(t);
}
function fo(t) {
  return new Promise((e) => {
    setTimeout(e, t);
  });
}
function Zr(t) {
  fo(0).then(t);
}
function ji() {
  if (typeof AbortController == "function")
    return new AbortController();
}
function qt(t, e, r) {
  return r.isDataEqual != null && r.isDataEqual(t, e) ? t : typeof r.structuralSharing == "function" ? r.structuralSharing(t, e) : r.structuralSharing !== !1 ? ho(t, e) : e;
}
class Di extends Oe {
  constructor() {
    super(), this.setup = (e) => {
      if (!Ue && window.addEventListener) {
        const r = () => e();
        return window.addEventListener("visibilitychange", r, !1), window.addEventListener("focus", r, !1), () => {
          window.removeEventListener("visibilitychange", r), window.removeEventListener("focus", r);
        };
      }
    };
  }
  onSubscribe() {
    this.cleanup || this.setEventListener(this.setup);
  }
  onUnsubscribe() {
    if (!this.hasListeners()) {
      var e;
      (e = this.cleanup) == null || e.call(this), this.cleanup = void 0;
    }
  }
  setEventListener(e) {
    var r;
    this.setup = e, (r = this.cleanup) == null || r.call(this), this.cleanup = e((n) => {
      typeof n == "boolean" ? this.setFocused(n) : this.onFocus();
    });
  }
  setFocused(e) {
    this.focused !== e && (this.focused = e, this.onFocus());
  }
  onFocus() {
    this.listeners.forEach(({
      listener: e
    }) => {
      e();
    });
  }
  isFocused() {
    return typeof this.focused == "boolean" ? this.focused : typeof document > "u" ? !0 : [void 0, "visible", "prerender"].includes(document.visibilityState);
  }
}
const ht = new Di(), Jr = ["online", "offline"];
class Ti extends Oe {
  constructor() {
    super(), this.setup = (e) => {
      if (!Ue && window.addEventListener) {
        const r = () => e();
        return Jr.forEach((n) => {
          window.addEventListener(n, r, !1);
        }), () => {
          Jr.forEach((n) => {
            window.removeEventListener(n, r);
          });
        };
      }
    };
  }
  onSubscribe() {
    this.cleanup || this.setEventListener(this.setup);
  }
  onUnsubscribe() {
    if (!this.hasListeners()) {
      var e;
      (e = this.cleanup) == null || e.call(this), this.cleanup = void 0;
    }
  }
  setEventListener(e) {
    var r;
    this.setup = e, (r = this.cleanup) == null || r.call(this), this.cleanup = e((n) => {
      typeof n == "boolean" ? this.setOnline(n) : this.onOnline();
    });
  }
  setOnline(e) {
    this.online !== e && (this.online = e, this.onOnline());
  }
  onOnline() {
    this.listeners.forEach(({
      listener: e
    }) => {
      e();
    });
  }
  isOnline() {
    return typeof this.online == "boolean" ? this.online : typeof navigator > "u" || typeof navigator.onLine > "u" ? !0 : navigator.onLine;
  }
}
const ft = new Ti();
function Ui(t) {
  return Math.min(1e3 * 2 ** t, 3e4);
}
function wt(t) {
  return (t ?? "online") === "online" ? ft.isOnline() : !0;
}
class po {
  constructor(e) {
    this.revert = e == null ? void 0 : e.revert, this.silent = e == null ? void 0 : e.silent;
  }
}
function it(t) {
  return t instanceof po;
}
function go(t) {
  let e = !1, r = 0, n = !1, o, i, a;
  const s = new Promise((m, w) => {
    i = m, a = w;
  }), l = (m) => {
    n || (f(new po(m)), t.abort == null || t.abort());
  }, u = () => {
    e = !0;
  }, h = () => {
    e = !1;
  }, c = () => !ht.isFocused() || t.networkMode !== "always" && !ft.isOnline(), p = (m) => {
    n || (n = !0, t.onSuccess == null || t.onSuccess(m), o == null || o(), i(m));
  }, f = (m) => {
    n || (n = !0, t.onError == null || t.onError(m), o == null || o(), a(m));
  }, g = () => new Promise((m) => {
    o = (w) => {
      const x = n || !c();
      return x && m(w), x;
    }, t.onPause == null || t.onPause();
  }).then(() => {
    o = void 0, n || t.onContinue == null || t.onContinue();
  }), y = () => {
    if (n)
      return;
    let m;
    try {
      m = t.fn();
    } catch (w) {
      m = Promise.reject(w);
    }
    Promise.resolve(m).then(p).catch((w) => {
      var x, R;
      if (n)
        return;
      const N = (x = t.retry) != null ? x : 3, z = (R = t.retryDelay) != null ? R : Ui, S = typeof z == "function" ? z(r, w) : z, M = N === !0 || typeof N == "number" && r < N || typeof N == "function" && N(r, w);
      if (e || !M) {
        f(w);
        return;
      }
      r++, t.onFail == null || t.onFail(r, w), fo(S).then(() => {
        if (c())
          return g();
      }).then(() => {
        e ? f(w) : y();
      });
    });
  };
  return wt(t.networkMode) ? y() : g().then(y), {
    promise: s,
    cancel: l,
    continue: () => (o == null ? void 0 : o()) ? s : Promise.resolve(),
    cancelRetry: u,
    continueRetry: h
  };
}
const fr = console;
function qi() {
  let t = [], e = 0, r = (h) => {
    h();
  }, n = (h) => {
    h();
  };
  const o = (h) => {
    let c;
    e++;
    try {
      c = h();
    } finally {
      e--, e || s();
    }
    return c;
  }, i = (h) => {
    e ? t.push(h) : Zr(() => {
      r(h);
    });
  }, a = (h) => (...c) => {
    i(() => {
      h(...c);
    });
  }, s = () => {
    const h = t;
    t = [], h.length && Zr(() => {
      n(() => {
        h.forEach((c) => {
          r(c);
        });
      });
    });
  };
  return {
    batch: o,
    batchCalls: a,
    schedule: i,
    setNotifyFunction: (h) => {
      r = h;
    },
    setBatchNotifyFunction: (h) => {
      n = h;
    }
  };
}
const F = qi();
class vo {
  destroy() {
    this.clearGcTimeout();
  }
  scheduleGc() {
    this.clearGcTimeout(), Tt(this.cacheTime) && (this.gcTimeout = setTimeout(() => {
      this.optionalRemove();
    }, this.cacheTime));
  }
  updateCacheTime(e) {
    this.cacheTime = Math.max(this.cacheTime || 0, e ?? (Ue ? 1 / 0 : 5 * 60 * 1e3));
  }
  clearGcTimeout() {
    this.gcTimeout && (clearTimeout(this.gcTimeout), this.gcTimeout = void 0);
  }
}
class Li extends vo {
  constructor(e) {
    super(), this.abortSignalConsumed = !1, this.defaultOptions = e.defaultOptions, this.setOptions(e.options), this.observers = [], this.cache = e.cache, this.logger = e.logger || fr, this.queryKey = e.queryKey, this.queryHash = e.queryHash, this.initialState = e.state || Qi(this.options), this.state = this.initialState, this.scheduleGc();
  }
  get meta() {
    return this.options.meta;
  }
  setOptions(e) {
    this.options = {
      ...this.defaultOptions,
      ...e
    }, this.updateCacheTime(this.options.cacheTime);
  }
  optionalRemove() {
    !this.observers.length && this.state.fetchStatus === "idle" && this.cache.remove(this);
  }
  setData(e, r) {
    const n = qt(this.state.data, e, this.options);
    return this.dispatch({
      data: n,
      type: "success",
      dataUpdatedAt: r == null ? void 0 : r.updatedAt,
      manual: r == null ? void 0 : r.manual
    }), n;
  }
  setState(e, r) {
    this.dispatch({
      type: "setState",
      state: e,
      setStateOptions: r
    });
  }
  cancel(e) {
    var r;
    const n = this.promise;
    return (r = this.retryer) == null || r.cancel(e), n ? n.then(G).catch(G) : Promise.resolve();
  }
  destroy() {
    super.destroy(), this.cancel({
      silent: !0
    });
  }
  reset() {
    this.destroy(), this.setState(this.initialState);
  }
  isActive() {
    return this.observers.some((e) => e.options.enabled !== !1);
  }
  isDisabled() {
    return this.getObserversCount() > 0 && !this.isActive();
  }
  isStale() {
    return this.state.isInvalidated || !this.state.dataUpdatedAt || this.observers.some((e) => e.getCurrentResult().isStale);
  }
  isStaleByTime(e = 0) {
    return this.state.isInvalidated || !this.state.dataUpdatedAt || !co(this.state.dataUpdatedAt, e);
  }
  onFocus() {
    var e;
    const r = this.observers.find((n) => n.shouldFetchOnWindowFocus());
    r && r.refetch({
      cancelRefetch: !1
    }), (e = this.retryer) == null || e.continue();
  }
  onOnline() {
    var e;
    const r = this.observers.find((n) => n.shouldFetchOnReconnect());
    r && r.refetch({
      cancelRefetch: !1
    }), (e = this.retryer) == null || e.continue();
  }
  addObserver(e) {
    this.observers.includes(e) || (this.observers.push(e), this.clearGcTimeout(), this.cache.notify({
      type: "observerAdded",
      query: this,
      observer: e
    }));
  }
  removeObserver(e) {
    this.observers.includes(e) && (this.observers = this.observers.filter((r) => r !== e), this.observers.length || (this.retryer && (this.abortSignalConsumed ? this.retryer.cancel({
      revert: !0
    }) : this.retryer.cancelRetry()), this.scheduleGc()), this.cache.notify({
      type: "observerRemoved",
      query: this,
      observer: e
    }));
  }
  getObserversCount() {
    return this.observers.length;
  }
  invalidate() {
    this.state.isInvalidated || this.dispatch({
      type: "invalidate"
    });
  }
  fetch(e, r) {
    var n, o;
    if (this.state.fetchStatus !== "idle") {
      if (this.state.dataUpdatedAt && r != null && r.cancelRefetch)
        this.cancel({
          silent: !0
        });
      else if (this.promise) {
        var i;
        return (i = this.retryer) == null || i.continueRetry(), this.promise;
      }
    }
    if (e && this.setOptions(e), !this.options.queryFn) {
      const f = this.observers.find((g) => g.options.queryFn);
      f && this.setOptions(f.options);
    }
    const a = ji(), s = {
      queryKey: this.queryKey,
      pageParam: void 0,
      meta: this.meta
    }, l = (f) => {
      Object.defineProperty(f, "signal", {
        enumerable: !0,
        get: () => {
          if (a)
            return this.abortSignalConsumed = !0, a.signal;
        }
      });
    };
    l(s);
    const u = () => this.options.queryFn ? (this.abortSignalConsumed = !1, this.options.queryFn(s)) : Promise.reject("Missing queryFn for queryKey '" + this.options.queryHash + "'"), h = {
      fetchOptions: r,
      options: this.options,
      queryKey: this.queryKey,
      state: this.state,
      fetchFn: u
    };
    if (l(h), (n = this.options.behavior) == null || n.onFetch(h), this.revertState = this.state, this.state.fetchStatus === "idle" || this.state.fetchMeta !== ((o = h.fetchOptions) == null ? void 0 : o.meta)) {
      var c;
      this.dispatch({
        type: "fetch",
        meta: (c = h.fetchOptions) == null ? void 0 : c.meta
      });
    }
    const p = (f) => {
      if (it(f) && f.silent || this.dispatch({
        type: "error",
        error: f
      }), !it(f)) {
        var g, y, m, w;
        (g = (y = this.cache.config).onError) == null || g.call(y, f, this), (m = (w = this.cache.config).onSettled) == null || m.call(w, this.state.data, f, this);
      }
      this.isFetchingOptimistic || this.scheduleGc(), this.isFetchingOptimistic = !1;
    };
    return this.retryer = go({
      fn: h.fetchFn,
      abort: a == null ? void 0 : a.abort.bind(a),
      onSuccess: (f) => {
        var g, y, m, w;
        if (typeof f > "u") {
          p(new Error(this.queryHash + " data is undefined"));
          return;
        }
        this.setData(f), (g = (y = this.cache.config).onSuccess) == null || g.call(y, f, this), (m = (w = this.cache.config).onSettled) == null || m.call(w, f, this.state.error, this), this.isFetchingOptimistic || this.scheduleGc(), this.isFetchingOptimistic = !1;
      },
      onError: p,
      onFail: (f, g) => {
        this.dispatch({
          type: "failed",
          failureCount: f,
          error: g
        });
      },
      onPause: () => {
        this.dispatch({
          type: "pause"
        });
      },
      onContinue: () => {
        this.dispatch({
          type: "continue"
        });
      },
      retry: h.options.retry,
      retryDelay: h.options.retryDelay,
      networkMode: h.options.networkMode
    }), this.promise = this.retryer.promise, this.promise;
  }
  dispatch(e) {
    const r = (n) => {
      var o, i;
      switch (e.type) {
        case "failed":
          return {
            ...n,
            fetchFailureCount: e.failureCount,
            fetchFailureReason: e.error
          };
        case "pause":
          return {
            ...n,
            fetchStatus: "paused"
          };
        case "continue":
          return {
            ...n,
            fetchStatus: "fetching"
          };
        case "fetch":
          return {
            ...n,
            fetchFailureCount: 0,
            fetchFailureReason: null,
            fetchMeta: (o = e.meta) != null ? o : null,
            fetchStatus: wt(this.options.networkMode) ? "fetching" : "paused",
            ...!n.dataUpdatedAt && {
              error: null,
              status: "loading"
            }
          };
        case "success":
          return {
            ...n,
            data: e.data,
            dataUpdateCount: n.dataUpdateCount + 1,
            dataUpdatedAt: (i = e.dataUpdatedAt) != null ? i : Date.now(),
            error: null,
            isInvalidated: !1,
            status: "success",
            ...!e.manual && {
              fetchStatus: "idle",
              fetchFailureCount: 0,
              fetchFailureReason: null
            }
          };
        case "error":
          const a = e.error;
          return it(a) && a.revert && this.revertState ? {
            ...this.revertState,
            fetchStatus: "idle"
          } : {
            ...n,
            error: a,
            errorUpdateCount: n.errorUpdateCount + 1,
            errorUpdatedAt: Date.now(),
            fetchFailureCount: n.fetchFailureCount + 1,
            fetchFailureReason: a,
            fetchStatus: "idle",
            status: "error"
          };
        case "invalidate":
          return {
            ...n,
            isInvalidated: !0
          };
        case "setState":
          return {
            ...n,
            ...e.state
          };
      }
    };
    this.state = r(this.state), F.batch(() => {
      this.observers.forEach((n) => {
        n.onQueryUpdate(e);
      }), this.cache.notify({
        query: this,
        type: "updated",
        action: e
      });
    });
  }
}
function Qi(t) {
  const e = typeof t.initialData == "function" ? t.initialData() : t.initialData, r = typeof e < "u", n = r ? typeof t.initialDataUpdatedAt == "function" ? t.initialDataUpdatedAt() : t.initialDataUpdatedAt : 0;
  return {
    data: e,
    dataUpdateCount: 0,
    dataUpdatedAt: r ? n ?? Date.now() : 0,
    error: null,
    errorUpdateCount: 0,
    errorUpdatedAt: 0,
    fetchFailureCount: 0,
    fetchFailureReason: null,
    fetchMeta: null,
    isInvalidated: !1,
    status: r ? "success" : "loading",
    fetchStatus: "idle"
  };
}
class Hi extends Oe {
  constructor(e) {
    super(), this.config = e || {}, this.queries = [], this.queriesMap = {};
  }
  build(e, r, n) {
    var o;
    const i = r.queryKey, a = (o = r.queryHash) != null ? o : hr(i, r);
    let s = this.get(a);
    return s || (s = new Li({
      cache: this,
      logger: e.getLogger(),
      queryKey: i,
      queryHash: a,
      options: e.defaultQueryOptions(r),
      state: n,
      defaultOptions: e.getQueryDefaults(i)
    }), this.add(s)), s;
  }
  add(e) {
    this.queriesMap[e.queryHash] || (this.queriesMap[e.queryHash] = e, this.queries.push(e), this.notify({
      type: "added",
      query: e
    }));
  }
  remove(e) {
    const r = this.queriesMap[e.queryHash];
    r && (e.destroy(), this.queries = this.queries.filter((n) => n !== e), r === e && delete this.queriesMap[e.queryHash], this.notify({
      type: "removed",
      query: e
    }));
  }
  clear() {
    F.batch(() => {
      this.queries.forEach((e) => {
        this.remove(e);
      });
    });
  }
  get(e) {
    return this.queriesMap[e];
  }
  getAll() {
    return this.queries;
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  find(e, r) {
    const [n] = se(e, r);
    return typeof n.exact > "u" && (n.exact = !0), this.queries.find((o) => Vr(n, o));
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  findAll(e, r) {
    const [n] = se(e, r);
    return Object.keys(n).length > 0 ? this.queries.filter((o) => Vr(n, o)) : this.queries;
  }
  notify(e) {
    F.batch(() => {
      this.listeners.forEach(({
        listener: r
      }) => {
        r(e);
      });
    });
  }
  onFocus() {
    F.batch(() => {
      this.queries.forEach((e) => {
        e.onFocus();
      });
    });
  }
  onOnline() {
    F.batch(() => {
      this.queries.forEach((e) => {
        e.onOnline();
      });
    });
  }
}
class Bi extends vo {
  constructor(e) {
    super(), this.defaultOptions = e.defaultOptions, this.mutationId = e.mutationId, this.mutationCache = e.mutationCache, this.logger = e.logger || fr, this.observers = [], this.state = e.state || mo(), this.setOptions(e.options), this.scheduleGc();
  }
  setOptions(e) {
    this.options = {
      ...this.defaultOptions,
      ...e
    }, this.updateCacheTime(this.options.cacheTime);
  }
  get meta() {
    return this.options.meta;
  }
  setState(e) {
    this.dispatch({
      type: "setState",
      state: e
    });
  }
  addObserver(e) {
    this.observers.includes(e) || (this.observers.push(e), this.clearGcTimeout(), this.mutationCache.notify({
      type: "observerAdded",
      mutation: this,
      observer: e
    }));
  }
  removeObserver(e) {
    this.observers = this.observers.filter((r) => r !== e), this.scheduleGc(), this.mutationCache.notify({
      type: "observerRemoved",
      mutation: this,
      observer: e
    });
  }
  optionalRemove() {
    this.observers.length || (this.state.status === "loading" ? this.scheduleGc() : this.mutationCache.remove(this));
  }
  continue() {
    var e, r;
    return (e = (r = this.retryer) == null ? void 0 : r.continue()) != null ? e : this.execute();
  }
  async execute() {
    const e = () => {
      var M;
      return this.retryer = go({
        fn: () => this.options.mutationFn ? this.options.mutationFn(this.state.variables) : Promise.reject("No mutationFn found"),
        onFail: (v, O) => {
          this.dispatch({
            type: "failed",
            failureCount: v,
            error: O
          });
        },
        onPause: () => {
          this.dispatch({
            type: "pause"
          });
        },
        onContinue: () => {
          this.dispatch({
            type: "continue"
          });
        },
        retry: (M = this.options.retry) != null ? M : 0,
        retryDelay: this.options.retryDelay,
        networkMode: this.options.networkMode
      }), this.retryer.promise;
    }, r = this.state.status === "loading";
    try {
      var n, o, i, a, s, l, u, h;
      if (!r) {
        var c, p, f, g;
        this.dispatch({
          type: "loading",
          variables: this.options.variables
        }), await ((c = (p = this.mutationCache.config).onMutate) == null ? void 0 : c.call(p, this.state.variables, this));
        const v = await ((f = (g = this.options).onMutate) == null ? void 0 : f.call(g, this.state.variables));
        v !== this.state.context && this.dispatch({
          type: "loading",
          context: v,
          variables: this.state.variables
        });
      }
      const M = await e();
      return await ((n = (o = this.mutationCache.config).onSuccess) == null ? void 0 : n.call(o, M, this.state.variables, this.state.context, this)), await ((i = (a = this.options).onSuccess) == null ? void 0 : i.call(a, M, this.state.variables, this.state.context)), await ((s = (l = this.mutationCache.config).onSettled) == null ? void 0 : s.call(l, M, null, this.state.variables, this.state.context, this)), await ((u = (h = this.options).onSettled) == null ? void 0 : u.call(h, M, null, this.state.variables, this.state.context)), this.dispatch({
        type: "success",
        data: M
      }), M;
    } catch (M) {
      try {
        var y, m, w, x, R, N, z, S;
        throw await ((y = (m = this.mutationCache.config).onError) == null ? void 0 : y.call(m, M, this.state.variables, this.state.context, this)), await ((w = (x = this.options).onError) == null ? void 0 : w.call(x, M, this.state.variables, this.state.context)), await ((R = (N = this.mutationCache.config).onSettled) == null ? void 0 : R.call(N, void 0, M, this.state.variables, this.state.context, this)), await ((z = (S = this.options).onSettled) == null ? void 0 : z.call(S, void 0, M, this.state.variables, this.state.context)), M;
      } finally {
        this.dispatch({
          type: "error",
          error: M
        });
      }
    }
  }
  dispatch(e) {
    const r = (n) => {
      switch (e.type) {
        case "failed":
          return {
            ...n,
            failureCount: e.failureCount,
            failureReason: e.error
          };
        case "pause":
          return {
            ...n,
            isPaused: !0
          };
        case "continue":
          return {
            ...n,
            isPaused: !1
          };
        case "loading":
          return {
            ...n,
            context: e.context,
            data: void 0,
            failureCount: 0,
            failureReason: null,
            error: null,
            isPaused: !wt(this.options.networkMode),
            status: "loading",
            variables: e.variables
          };
        case "success":
          return {
            ...n,
            data: e.data,
            failureCount: 0,
            failureReason: null,
            error: null,
            status: "success",
            isPaused: !1
          };
        case "error":
          return {
            ...n,
            data: void 0,
            error: e.error,
            failureCount: n.failureCount + 1,
            failureReason: e.error,
            isPaused: !1,
            status: "error"
          };
        case "setState":
          return {
            ...n,
            ...e.state
          };
      }
    };
    this.state = r(this.state), F.batch(() => {
      this.observers.forEach((n) => {
        n.onMutationUpdate(e);
      }), this.mutationCache.notify({
        mutation: this,
        type: "updated",
        action: e
      });
    });
  }
}
function mo() {
  return {
    context: void 0,
    data: void 0,
    error: null,
    failureCount: 0,
    failureReason: null,
    isPaused: !1,
    status: "idle",
    variables: void 0
  };
}
class Vi extends Oe {
  constructor(e) {
    super(), this.config = e || {}, this.mutations = [], this.mutationId = 0;
  }
  build(e, r, n) {
    const o = new Bi({
      mutationCache: this,
      logger: e.getLogger(),
      mutationId: ++this.mutationId,
      options: e.defaultMutationOptions(r),
      state: n,
      defaultOptions: r.mutationKey ? e.getMutationDefaults(r.mutationKey) : void 0
    });
    return this.add(o), o;
  }
  add(e) {
    this.mutations.push(e), this.notify({
      type: "added",
      mutation: e
    });
  }
  remove(e) {
    this.mutations = this.mutations.filter((r) => r !== e), this.notify({
      type: "removed",
      mutation: e
    });
  }
  clear() {
    F.batch(() => {
      this.mutations.forEach((e) => {
        this.remove(e);
      });
    });
  }
  getAll() {
    return this.mutations;
  }
  find(e) {
    return typeof e.exact > "u" && (e.exact = !0), this.mutations.find((r) => Kr(e, r));
  }
  findAll(e) {
    return this.mutations.filter((r) => Kr(e, r));
  }
  notify(e) {
    F.batch(() => {
      this.listeners.forEach(({
        listener: r
      }) => {
        r(e);
      });
    });
  }
  resumePausedMutations() {
    var e;
    return this.resuming = ((e = this.resuming) != null ? e : Promise.resolve()).then(() => {
      const r = this.mutations.filter((n) => n.state.isPaused);
      return F.batch(() => r.reduce((n, o) => n.then(() => o.continue().catch(G)), Promise.resolve()));
    }).then(() => {
      this.resuming = void 0;
    }), this.resuming;
  }
}
function Ki() {
  return {
    onFetch: (t) => {
      t.fetchFn = () => {
        var e, r, n, o, i, a;
        const s = (e = t.fetchOptions) == null || (r = e.meta) == null ? void 0 : r.refetchPage, l = (n = t.fetchOptions) == null || (o = n.meta) == null ? void 0 : o.fetchMore, u = l == null ? void 0 : l.pageParam, h = (l == null ? void 0 : l.direction) === "forward", c = (l == null ? void 0 : l.direction) === "backward", p = ((i = t.state.data) == null ? void 0 : i.pages) || [], f = ((a = t.state.data) == null ? void 0 : a.pageParams) || [];
        let g = f, y = !1;
        const m = (S) => {
          Object.defineProperty(S, "signal", {
            enumerable: !0,
            get: () => {
              var M;
              if ((M = t.signal) != null && M.aborted)
                y = !0;
              else {
                var v;
                (v = t.signal) == null || v.addEventListener("abort", () => {
                  y = !0;
                });
              }
              return t.signal;
            }
          });
        }, w = t.options.queryFn || (() => Promise.reject("Missing queryFn for queryKey '" + t.options.queryHash + "'")), x = (S, M, v, O) => (g = O ? [M, ...g] : [...g, M], O ? [v, ...S] : [...S, v]), R = (S, M, v, O) => {
          if (y)
            return Promise.reject("Cancelled");
          if (typeof v > "u" && !M && S.length)
            return Promise.resolve(S);
          const W = {
            queryKey: t.queryKey,
            pageParam: v,
            meta: t.options.meta
          };
          m(W);
          const U = w(W);
          return Promise.resolve(U).then((Ke) => x(S, v, Ke, O));
        };
        let N;
        if (!p.length)
          N = R([]);
        else if (h) {
          const S = typeof u < "u", M = S ? u : Yr(t.options, p);
          N = R(p, S, M);
        } else if (c) {
          const S = typeof u < "u", M = S ? u : Wi(t.options, p);
          N = R(p, S, M, !0);
        } else {
          g = [];
          const S = typeof t.options.getNextPageParam > "u";
          N = (s && p[0] ? s(p[0], 0, p) : !0) ? R([], S, f[0]) : Promise.resolve(x([], f[0], p[0]));
          for (let v = 1; v < p.length; v++)
            N = N.then((O) => {
              if (s && p[v] ? s(p[v], v, p) : !0) {
                const U = S ? f[v] : Yr(t.options, O);
                return R(O, S, U);
              }
              return Promise.resolve(x(O, f[v], p[v]));
            });
        }
        return N.then((S) => ({
          pages: S,
          pageParams: g
        }));
      };
    }
  };
}
function Yr(t, e) {
  return t.getNextPageParam == null ? void 0 : t.getNextPageParam(e[e.length - 1], e);
}
function Wi(t, e) {
  return t.getPreviousPageParam == null ? void 0 : t.getPreviousPageParam(e[0], e);
}
class Gi {
  constructor(e = {}) {
    this.queryCache = e.queryCache || new Hi(), this.mutationCache = e.mutationCache || new Vi(), this.logger = e.logger || fr, this.defaultOptions = e.defaultOptions || {}, this.queryDefaults = [], this.mutationDefaults = [], this.mountCount = 0;
  }
  mount() {
    this.mountCount++, this.mountCount === 1 && (this.unsubscribeFocus = ht.subscribe(() => {
      ht.isFocused() && (this.resumePausedMutations(), this.queryCache.onFocus());
    }), this.unsubscribeOnline = ft.subscribe(() => {
      ft.isOnline() && (this.resumePausedMutations(), this.queryCache.onOnline());
    }));
  }
  unmount() {
    var e, r;
    this.mountCount--, this.mountCount === 0 && ((e = this.unsubscribeFocus) == null || e.call(this), this.unsubscribeFocus = void 0, (r = this.unsubscribeOnline) == null || r.call(this), this.unsubscribeOnline = void 0);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  isFetching(e, r) {
    const [n] = se(e, r);
    return n.fetchStatus = "fetching", this.queryCache.findAll(n).length;
  }
  isMutating(e) {
    return this.mutationCache.findAll({
      ...e,
      fetching: !0
    }).length;
  }
  /**
   * @deprecated This method will accept only queryKey in the next major version.
   */
  getQueryData(e, r) {
    var n;
    return (n = this.queryCache.find(e, r)) == null ? void 0 : n.state.data;
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  ensureQueryData(e, r, n) {
    const o = ze(e, r, n), i = this.getQueryData(o.queryKey);
    return i ? Promise.resolve(i) : this.fetchQuery(o);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  getQueriesData(e) {
    return this.getQueryCache().findAll(e).map(({
      queryKey: r,
      state: n
    }) => {
      const o = n.data;
      return [r, o];
    });
  }
  setQueryData(e, r, n) {
    const o = this.queryCache.find(e), i = o == null ? void 0 : o.state.data, a = Ii(r, i);
    if (typeof a > "u")
      return;
    const s = ze(e), l = this.defaultQueryOptions(s);
    return this.queryCache.build(this, l).setData(a, {
      ...n,
      manual: !0
    });
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  setQueriesData(e, r, n) {
    return F.batch(() => this.getQueryCache().findAll(e).map(({
      queryKey: o
    }) => [o, this.setQueryData(o, r, n)]));
  }
  getQueryState(e, r) {
    var n;
    return (n = this.queryCache.find(e, r)) == null ? void 0 : n.state;
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  removeQueries(e, r) {
    const [n] = se(e, r), o = this.queryCache;
    F.batch(() => {
      o.findAll(n).forEach((i) => {
        o.remove(i);
      });
    });
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  resetQueries(e, r, n) {
    const [o, i] = se(e, r, n), a = this.queryCache, s = {
      type: "active",
      ...o
    };
    return F.batch(() => (a.findAll(o).forEach((l) => {
      l.reset();
    }), this.refetchQueries(s, i)));
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  cancelQueries(e, r, n) {
    const [o, i = {}] = se(e, r, n);
    typeof i.revert > "u" && (i.revert = !0);
    const a = F.batch(() => this.queryCache.findAll(o).map((s) => s.cancel(i)));
    return Promise.all(a).then(G).catch(G);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  invalidateQueries(e, r, n) {
    const [o, i] = se(e, r, n);
    return F.batch(() => {
      var a, s;
      if (this.queryCache.findAll(o).forEach((u) => {
        u.invalidate();
      }), o.refetchType === "none")
        return Promise.resolve();
      const l = {
        ...o,
        type: (a = (s = o.refetchType) != null ? s : o.type) != null ? a : "active"
      };
      return this.refetchQueries(l, i);
    });
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  refetchQueries(e, r, n) {
    const [o, i] = se(e, r, n), a = F.batch(() => this.queryCache.findAll(o).filter((l) => !l.isDisabled()).map((l) => {
      var u;
      return l.fetch(void 0, {
        ...i,
        cancelRefetch: (u = i == null ? void 0 : i.cancelRefetch) != null ? u : !0,
        meta: {
          refetchPage: o.refetchPage
        }
      });
    }));
    let s = Promise.all(a).then(G);
    return i != null && i.throwOnError || (s = s.catch(G)), s;
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  fetchQuery(e, r, n) {
    const o = ze(e, r, n), i = this.defaultQueryOptions(o);
    typeof i.retry > "u" && (i.retry = !1);
    const a = this.queryCache.build(this, i);
    return a.isStaleByTime(i.staleTime) ? a.fetch(i) : Promise.resolve(a.state.data);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  prefetchQuery(e, r, n) {
    return this.fetchQuery(e, r, n).then(G).catch(G);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  fetchInfiniteQuery(e, r, n) {
    const o = ze(e, r, n);
    return o.behavior = Ki(), this.fetchQuery(o);
  }
  /**
   * @deprecated This method should be used with only one object argument.
   */
  prefetchInfiniteQuery(e, r, n) {
    return this.fetchInfiniteQuery(e, r, n).then(G).catch(G);
  }
  resumePausedMutations() {
    return this.mutationCache.resumePausedMutations();
  }
  getQueryCache() {
    return this.queryCache;
  }
  getMutationCache() {
    return this.mutationCache;
  }
  getLogger() {
    return this.logger;
  }
  getDefaultOptions() {
    return this.defaultOptions;
  }
  setDefaultOptions(e) {
    this.defaultOptions = e;
  }
  setQueryDefaults(e, r) {
    const n = this.queryDefaults.find((o) => pe(e) === pe(o.queryKey));
    n ? n.defaultOptions = r : this.queryDefaults.push({
      queryKey: e,
      defaultOptions: r
    });
  }
  getQueryDefaults(e) {
    if (!e)
      return;
    const r = this.queryDefaults.find((n) => ut(e, n.queryKey));
    return r == null ? void 0 : r.defaultOptions;
  }
  setMutationDefaults(e, r) {
    const n = this.mutationDefaults.find((o) => pe(e) === pe(o.mutationKey));
    n ? n.defaultOptions = r : this.mutationDefaults.push({
      mutationKey: e,
      defaultOptions: r
    });
  }
  getMutationDefaults(e) {
    if (!e)
      return;
    const r = this.mutationDefaults.find((n) => ut(e, n.mutationKey));
    return r == null ? void 0 : r.defaultOptions;
  }
  defaultQueryOptions(e) {
    if (e != null && e._defaulted)
      return e;
    const r = {
      ...this.defaultOptions.queries,
      ...this.getQueryDefaults(e == null ? void 0 : e.queryKey),
      ...e,
      _defaulted: !0
    };
    return !r.queryHash && r.queryKey && (r.queryHash = hr(r.queryKey, r)), typeof r.refetchOnReconnect > "u" && (r.refetchOnReconnect = r.networkMode !== "always"), typeof r.useErrorBoundary > "u" && (r.useErrorBoundary = !!r.suspense), r;
  }
  defaultMutationOptions(e) {
    return e != null && e._defaulted ? e : {
      ...this.defaultOptions.mutations,
      ...this.getMutationDefaults(e == null ? void 0 : e.mutationKey),
      ...e,
      _defaulted: !0
    };
  }
  clear() {
    this.queryCache.clear(), this.mutationCache.clear();
  }
}
class Zi extends Oe {
  constructor(e, r) {
    super(), this.client = e, this.options = r, this.trackedProps = /* @__PURE__ */ new Set(), this.selectError = null, this.bindMethods(), this.setOptions(r);
  }
  bindMethods() {
    this.remove = this.remove.bind(this), this.refetch = this.refetch.bind(this);
  }
  onSubscribe() {
    this.listeners.size === 1 && (this.currentQuery.addObserver(this), Xr(this.currentQuery, this.options) && this.executeFetch(), this.updateTimers());
  }
  onUnsubscribe() {
    this.hasListeners() || this.destroy();
  }
  shouldFetchOnReconnect() {
    return Lt(this.currentQuery, this.options, this.options.refetchOnReconnect);
  }
  shouldFetchOnWindowFocus() {
    return Lt(this.currentQuery, this.options, this.options.refetchOnWindowFocus);
  }
  destroy() {
    this.listeners = /* @__PURE__ */ new Set(), this.clearStaleTimeout(), this.clearRefetchInterval(), this.currentQuery.removeObserver(this);
  }
  setOptions(e, r) {
    const n = this.options, o = this.currentQuery;
    if (this.options = this.client.defaultQueryOptions(e), dt(n, this.options) || this.client.getQueryCache().notify({
      type: "observerOptionsUpdated",
      query: this.currentQuery,
      observer: this
    }), typeof this.options.enabled < "u" && typeof this.options.enabled != "boolean")
      throw new Error("Expected enabled to be a boolean");
    this.options.queryKey || (this.options.queryKey = n.queryKey), this.updateQuery();
    const i = this.hasListeners();
    i && en(this.currentQuery, o, this.options, n) && this.executeFetch(), this.updateResult(r), i && (this.currentQuery !== o || this.options.enabled !== n.enabled || this.options.staleTime !== n.staleTime) && this.updateStaleTimeout();
    const a = this.computeRefetchInterval();
    i && (this.currentQuery !== o || this.options.enabled !== n.enabled || a !== this.currentRefetchInterval) && this.updateRefetchInterval(a);
  }
  getOptimisticResult(e) {
    const r = this.client.getQueryCache().build(this.client, e), n = this.createResult(r, e);
    return Yi(this, n, e) && (this.currentResult = n, this.currentResultOptions = this.options, this.currentResultState = this.currentQuery.state), n;
  }
  getCurrentResult() {
    return this.currentResult;
  }
  trackResult(e) {
    const r = {};
    return Object.keys(e).forEach((n) => {
      Object.defineProperty(r, n, {
        configurable: !1,
        enumerable: !0,
        get: () => (this.trackedProps.add(n), e[n])
      });
    }), r;
  }
  getCurrentQuery() {
    return this.currentQuery;
  }
  remove() {
    this.client.getQueryCache().remove(this.currentQuery);
  }
  refetch({
    refetchPage: e,
    ...r
  } = {}) {
    return this.fetch({
      ...r,
      meta: {
        refetchPage: e
      }
    });
  }
  fetchOptimistic(e) {
    const r = this.client.defaultQueryOptions(e), n = this.client.getQueryCache().build(this.client, r);
    return n.isFetchingOptimistic = !0, n.fetch().then(() => this.createResult(n, r));
  }
  fetch(e) {
    var r;
    return this.executeFetch({
      ...e,
      cancelRefetch: (r = e.cancelRefetch) != null ? r : !0
    }).then(() => (this.updateResult(), this.currentResult));
  }
  executeFetch(e) {
    this.updateQuery();
    let r = this.currentQuery.fetch(this.options, e);
    return e != null && e.throwOnError || (r = r.catch(G)), r;
  }
  updateStaleTimeout() {
    if (this.clearStaleTimeout(), Ue || this.currentResult.isStale || !Tt(this.options.staleTime))
      return;
    const r = co(this.currentResult.dataUpdatedAt, this.options.staleTime) + 1;
    this.staleTimeoutId = setTimeout(() => {
      this.currentResult.isStale || this.updateResult();
    }, r);
  }
  computeRefetchInterval() {
    var e;
    return typeof this.options.refetchInterval == "function" ? this.options.refetchInterval(this.currentResult.data, this.currentQuery) : (e = this.options.refetchInterval) != null ? e : !1;
  }
  updateRefetchInterval(e) {
    this.clearRefetchInterval(), this.currentRefetchInterval = e, !(Ue || this.options.enabled === !1 || !Tt(this.currentRefetchInterval) || this.currentRefetchInterval === 0) && (this.refetchIntervalId = setInterval(() => {
      (this.options.refetchIntervalInBackground || ht.isFocused()) && this.executeFetch();
    }, this.currentRefetchInterval));
  }
  updateTimers() {
    this.updateStaleTimeout(), this.updateRefetchInterval(this.computeRefetchInterval());
  }
  clearStaleTimeout() {
    this.staleTimeoutId && (clearTimeout(this.staleTimeoutId), this.staleTimeoutId = void 0);
  }
  clearRefetchInterval() {
    this.refetchIntervalId && (clearInterval(this.refetchIntervalId), this.refetchIntervalId = void 0);
  }
  createResult(e, r) {
    const n = this.currentQuery, o = this.options, i = this.currentResult, a = this.currentResultState, s = this.currentResultOptions, l = e !== n, u = l ? e.state : this.currentQueryInitialState, h = l ? this.currentResult : this.previousQueryResult, {
      state: c
    } = e;
    let {
      dataUpdatedAt: p,
      error: f,
      errorUpdatedAt: g,
      fetchStatus: y,
      status: m
    } = c, w = !1, x = !1, R;
    if (r._optimisticResults) {
      const v = this.hasListeners(), O = !v && Xr(e, r), W = v && en(e, n, r, o);
      (O || W) && (y = wt(e.options.networkMode) ? "fetching" : "paused", p || (m = "loading")), r._optimisticResults === "isRestoring" && (y = "idle");
    }
    if (r.keepPreviousData && !c.dataUpdatedAt && h != null && h.isSuccess && m !== "error")
      R = h.data, p = h.dataUpdatedAt, m = h.status, w = !0;
    else if (r.select && typeof c.data < "u")
      if (i && c.data === (a == null ? void 0 : a.data) && r.select === this.selectFn)
        R = this.selectResult;
      else
        try {
          this.selectFn = r.select, R = r.select(c.data), R = qt(i == null ? void 0 : i.data, R, r), this.selectResult = R, this.selectError = null;
        } catch (v) {
          this.selectError = v;
        }
    else
      R = c.data;
    if (typeof r.placeholderData < "u" && typeof R > "u" && m === "loading") {
      let v;
      if (i != null && i.isPlaceholderData && r.placeholderData === (s == null ? void 0 : s.placeholderData))
        v = i.data;
      else if (v = typeof r.placeholderData == "function" ? r.placeholderData() : r.placeholderData, r.select && typeof v < "u")
        try {
          v = r.select(v), this.selectError = null;
        } catch (O) {
          this.selectError = O;
        }
      typeof v < "u" && (m = "success", R = qt(i == null ? void 0 : i.data, v, r), x = !0);
    }
    this.selectError && (f = this.selectError, R = this.selectResult, g = Date.now(), m = "error");
    const N = y === "fetching", z = m === "loading", S = m === "error";
    return {
      status: m,
      fetchStatus: y,
      isLoading: z,
      isSuccess: m === "success",
      isError: S,
      isInitialLoading: z && N,
      data: R,
      dataUpdatedAt: p,
      error: f,
      errorUpdatedAt: g,
      failureCount: c.fetchFailureCount,
      failureReason: c.fetchFailureReason,
      errorUpdateCount: c.errorUpdateCount,
      isFetched: c.dataUpdateCount > 0 || c.errorUpdateCount > 0,
      isFetchedAfterMount: c.dataUpdateCount > u.dataUpdateCount || c.errorUpdateCount > u.errorUpdateCount,
      isFetching: N,
      isRefetching: N && !z,
      isLoadingError: S && c.dataUpdatedAt === 0,
      isPaused: y === "paused",
      isPlaceholderData: x,
      isPreviousData: w,
      isRefetchError: S && c.dataUpdatedAt !== 0,
      isStale: pr(e, r),
      refetch: this.refetch,
      remove: this.remove
    };
  }
  updateResult(e) {
    const r = this.currentResult, n = this.createResult(this.currentQuery, this.options);
    if (this.currentResultState = this.currentQuery.state, this.currentResultOptions = this.options, dt(n, r))
      return;
    this.currentResult = n;
    const o = {
      cache: !0
    }, i = () => {
      if (!r)
        return !0;
      const {
        notifyOnChangeProps: a
      } = this.options, s = typeof a == "function" ? a() : a;
      if (s === "all" || !s && !this.trackedProps.size)
        return !0;
      const l = new Set(s ?? this.trackedProps);
      return this.options.useErrorBoundary && l.add("error"), Object.keys(this.currentResult).some((u) => {
        const h = u;
        return this.currentResult[h] !== r[h] && l.has(h);
      });
    };
    (e == null ? void 0 : e.listeners) !== !1 && i() && (o.listeners = !0), this.notify({
      ...o,
      ...e
    });
  }
  updateQuery() {
    const e = this.client.getQueryCache().build(this.client, this.options);
    if (e === this.currentQuery)
      return;
    const r = this.currentQuery;
    this.currentQuery = e, this.currentQueryInitialState = e.state, this.previousQueryResult = this.currentResult, this.hasListeners() && (r == null || r.removeObserver(this), e.addObserver(this));
  }
  onQueryUpdate(e) {
    const r = {};
    e.type === "success" ? r.onSuccess = !e.manual : e.type === "error" && !it(e.error) && (r.onError = !0), this.updateResult(r), this.hasListeners() && this.updateTimers();
  }
  notify(e) {
    F.batch(() => {
      if (e.onSuccess) {
        var r, n, o, i;
        (r = (n = this.options).onSuccess) == null || r.call(n, this.currentResult.data), (o = (i = this.options).onSettled) == null || o.call(i, this.currentResult.data, null);
      } else if (e.onError) {
        var a, s, l, u;
        (a = (s = this.options).onError) == null || a.call(s, this.currentResult.error), (l = (u = this.options).onSettled) == null || l.call(u, void 0, this.currentResult.error);
      }
      e.listeners && this.listeners.forEach(({
        listener: h
      }) => {
        h(this.currentResult);
      }), e.cache && this.client.getQueryCache().notify({
        query: this.currentQuery,
        type: "observerResultsUpdated"
      });
    });
  }
}
function Ji(t, e) {
  return e.enabled !== !1 && !t.state.dataUpdatedAt && !(t.state.status === "error" && e.retryOnMount === !1);
}
function Xr(t, e) {
  return Ji(t, e) || t.state.dataUpdatedAt > 0 && Lt(t, e, e.refetchOnMount);
}
function Lt(t, e, r) {
  if (e.enabled !== !1) {
    const n = typeof r == "function" ? r(t) : r;
    return n === "always" || n !== !1 && pr(t, e);
  }
  return !1;
}
function en(t, e, r, n) {
  return r.enabled !== !1 && (t !== e || n.enabled === !1) && (!r.suspense || t.state.status !== "error") && pr(t, r);
}
function pr(t, e) {
  return t.isStaleByTime(e.staleTime);
}
function Yi(t, e, r) {
  return r.keepPreviousData ? !1 : r.placeholderData !== void 0 ? e.isPlaceholderData : !dt(t.getCurrentResult(), e);
}
class Xi extends Oe {
  constructor(e, r) {
    super(), this.client = e, this.setOptions(r), this.bindMethods(), this.updateResult();
  }
  bindMethods() {
    this.mutate = this.mutate.bind(this), this.reset = this.reset.bind(this);
  }
  setOptions(e) {
    var r;
    const n = this.options;
    this.options = this.client.defaultMutationOptions(e), dt(n, this.options) || this.client.getMutationCache().notify({
      type: "observerOptionsUpdated",
      mutation: this.currentMutation,
      observer: this
    }), (r = this.currentMutation) == null || r.setOptions(this.options);
  }
  onUnsubscribe() {
    if (!this.hasListeners()) {
      var e;
      (e = this.currentMutation) == null || e.removeObserver(this);
    }
  }
  onMutationUpdate(e) {
    this.updateResult();
    const r = {
      listeners: !0
    };
    e.type === "success" ? r.onSuccess = !0 : e.type === "error" && (r.onError = !0), this.notify(r);
  }
  getCurrentResult() {
    return this.currentResult;
  }
  reset() {
    this.currentMutation = void 0, this.updateResult(), this.notify({
      listeners: !0
    });
  }
  mutate(e, r) {
    return this.mutateOptions = r, this.currentMutation && this.currentMutation.removeObserver(this), this.currentMutation = this.client.getMutationCache().build(this.client, {
      ...this.options,
      variables: typeof e < "u" ? e : this.options.variables
    }), this.currentMutation.addObserver(this), this.currentMutation.execute();
  }
  updateResult() {
    const e = this.currentMutation ? this.currentMutation.state : mo(), r = e.status === "loading", n = {
      ...e,
      isLoading: r,
      isPending: r,
      isSuccess: e.status === "success",
      isError: e.status === "error",
      isIdle: e.status === "idle",
      mutate: this.mutate,
      reset: this.reset
    };
    this.currentResult = n;
  }
  notify(e) {
    F.batch(() => {
      if (this.mutateOptions && this.hasListeners()) {
        if (e.onSuccess) {
          var r, n, o, i;
          (r = (n = this.mutateOptions).onSuccess) == null || r.call(n, this.currentResult.data, this.currentResult.variables, this.currentResult.context), (o = (i = this.mutateOptions).onSettled) == null || o.call(i, this.currentResult.data, null, this.currentResult.variables, this.currentResult.context);
        } else if (e.onError) {
          var a, s, l, u;
          (a = (s = this.mutateOptions).onError) == null || a.call(s, this.currentResult.error, this.currentResult.variables, this.currentResult.context), (l = (u = this.mutateOptions).onSettled) == null || l.call(u, void 0, this.currentResult.error, this.currentResult.variables, this.currentResult.context);
        }
      }
      e.listeners && this.listeners.forEach(({
        listener: h
      }) => {
        h(this.currentResult);
      });
    });
  }
}
function ea(t) {
  if (Object.prototype.hasOwnProperty.call(t, "__esModule")) return t;
  var e = t.default;
  if (typeof e == "function") {
    var r = function n() {
      return this instanceof n ? Reflect.construct(e, arguments, this.constructor) : e.apply(this, arguments);
    };
    r.prototype = e.prototype;
  } else r = {};
  return Object.defineProperty(r, "__esModule", { value: !0 }), Object.keys(t).forEach(function(n) {
    var o = Object.getOwnPropertyDescriptor(t, n);
    Object.defineProperty(r, n, o.get ? o : {
      enumerable: !0,
      get: function() {
        return t[n];
      }
    });
  }), r;
}
var Pt = { exports: {} }, Nt = {};
const ta = /* @__PURE__ */ ea(di);
/**
* @license React
* use-sync-external-store-shim.production.js
*
* Copyright (c) Meta Platforms, Inc. and affiliates.
*
* This source code is licensed under the MIT license found in the
* LICENSE file in the root directory of this source tree.
*/
var tn;
function ra() {
  if (tn) return Nt;
  tn = 1;
  var t = ta;
  function e(c, p) {
    return c === p && (c !== 0 || 1 / c === 1 / p) || c !== c && p !== p;
  }
  var r = typeof Object.is == "function" ? Object.is : e, n = t.useState, o = t.useEffect, i = t.useLayoutEffect, a = t.useDebugValue;
  function s(c, p) {
    var f = p(), g = n({ inst: { value: f, getSnapshot: p } }), y = g[0].inst, m = g[1];
    return i(
      function() {
        y.value = f, y.getSnapshot = p, l(y) && m({ inst: y });
      },
      [c, f, p]
    ), o(
      function() {
        return l(y) && m({ inst: y }), c(function() {
          l(y) && m({ inst: y });
        });
      },
      [c]
    ), a(f), f;
  }
  function l(c) {
    var p = c.getSnapshot;
    c = c.value;
    try {
      var f = p();
      return !r(c, f);
    } catch {
      return !0;
    }
  }
  function u(c, p) {
    return p();
  }
  var h = typeof window > "u" || typeof window.document > "u" || typeof window.document.createElement > "u" ? u : s;
  return Nt.useSyncExternalStore = t.useSyncExternalStore !== void 0 ? t.useSyncExternalStore : h, Nt;
}
var rn;
function na() {
  return rn || (rn = 1, Pt.exports = ra()), Pt.exports;
}
var oa = na();
const yo = oa.useSyncExternalStore, nn = /* @__PURE__ */ ve(void 0), wo = /* @__PURE__ */ ve(!1);
function bo(t, e) {
  return t || (e && typeof window < "u" ? (window.ReactQueryClientContext || (window.ReactQueryClientContext = nn), window.ReactQueryClientContext) : nn);
}
const _o = ({
  context: t
} = {}) => {
  const e = j(bo(t, j(wo)));
  if (!e)
    throw new Error("No QueryClient set, use QueryClientProvider to set one");
  return e;
}, ia = ({
  client: t,
  children: e,
  context: r,
  contextSharing: n = !1
}) => {
  ce(() => (t.mount(), () => {
    t.unmount();
  }), [t]);
  const o = bo(r, n);
  return /* @__PURE__ */ Q(wo.Provider, {
    value: !r && n
  }, /* @__PURE__ */ Q(o.Provider, {
    value: t
  }, e));
}, xo = /* @__PURE__ */ ve(!1), aa = () => j(xo);
xo.Provider;
function sa() {
  let t = !1;
  return {
    clearReset: () => {
      t = !1;
    },
    reset: () => {
      t = !0;
    },
    isReset: () => t
  };
}
const la = /* @__PURE__ */ ve(sa()), ca = () => j(la);
function ko(t, e) {
  return typeof t == "function" ? t(...e) : !!t;
}
const ua = (t, e) => {
  (t.suspense || t.useErrorBoundary) && (e.isReset() || (t.retryOnMount = !1));
}, da = (t) => {
  ce(() => {
    t.clearReset();
  }, [t]);
}, ha = ({
  result: t,
  errorResetBoundary: e,
  useErrorBoundary: r,
  query: n
}) => t.isError && !e.isReset() && !t.isFetching && ko(r, [t.error, n]), fa = (t) => {
  t.suspense && typeof t.staleTime != "number" && (t.staleTime = 1e3);
}, pa = (t, e) => t.isLoading && t.isFetching && !e, ga = (t, e, r) => (t == null ? void 0 : t.suspense) && pa(e, r), va = (t, e, r) => e.fetchOptimistic(t).then(({
  data: n
}) => {
  t.onSuccess == null || t.onSuccess(n), t.onSettled == null || t.onSettled(n, null);
}).catch((n) => {
  r.clearReset(), t.onError == null || t.onError(n), t.onSettled == null || t.onSettled(void 0, n);
});
function ma(t, e) {
  const r = _o({
    context: t.context
  }), n = aa(), o = ca(), i = r.defaultQueryOptions(t);
  i._optimisticResults = n ? "isRestoring" : "optimistic", i.onError && (i.onError = F.batchCalls(i.onError)), i.onSuccess && (i.onSuccess = F.batchCalls(i.onSuccess)), i.onSettled && (i.onSettled = F.batchCalls(i.onSettled)), fa(i), ua(i, o), da(o);
  const [a] = H(() => new e(r, i)), s = a.getOptimisticResult(i);
  if (yo(Me((l) => {
    const u = n ? () => {
    } : a.subscribe(F.batchCalls(l));
    return a.updateResult(), u;
  }, [a, n]), () => a.getCurrentResult(), () => a.getCurrentResult()), ce(() => {
    a.setOptions(i, {
      listeners: !1
    });
  }, [i, a]), ga(i, s, n))
    throw va(i, a, o);
  if (ha({
    result: s,
    errorResetBoundary: o,
    useErrorBoundary: i.useErrorBoundary,
    query: a.getCurrentQuery()
  }))
    throw s.error;
  return i.notifyOnChangeProps ? s : a.trackResult(s);
}
function ya(t, e, r) {
  const n = ze(t, e, r);
  return ma(n, Zi);
}
function gr(t, e, r) {
  const n = Fi(t, e), o = _o({
    context: n.context
  }), [i] = H(() => new Xi(o, n));
  ce(() => {
    i.setOptions(n);
  }, [i, n]);
  const a = yo(Me((l) => i.subscribe(F.batchCalls(l)), [i]), () => i.getCurrentResult(), () => i.getCurrentResult()), s = Me((l, u) => {
    i.mutate(l, u).catch(wa);
  }, [i]);
  if (a.error && ko(i.options.useErrorBoundary, [a.error]))
    throw a.error;
  return {
    ...a,
    mutate: s,
    mutateAsync: a.mutate
  };
}
function wa() {
}
const ba = async (t) => (await fetch(
  `${t}/booking_poliklinik/api/booking_poliklinik/list_poliklinik`
)).json(), Qt = () => {
  const t = /* @__PURE__ */ new Date(), e = t.getFullYear(), r = String(t.getMonth() + 1).padStart(2, "0"), n = String(t.getDate()).padStart(2, "0");
  return `${e}-${r}-${n}`;
}, vr = async (t, e) => {
  const r = new URLSearchParams({
    usia: e,
    kebutuhan: "Tidak",
    tanggal_periksa: Qt()
  });
  return (await fetch(
    `${t}/antrian_bpjs/api/antrian_bpjs/cek_antrian_bpjs?${r.toString()}`
  )).json();
}, mr = async (t, e) => {
  let n = e.urutan * 12e4 - 12e4, o = Qt() + " 07:30:00", a = new Date(o).getTime() + n;
  const s = new FormData(), l = {
    ...e,
    estimasi_antrian: a,
    tanggal_periksa: Qt()
  };
  for (const h in l)
    Object.prototype.hasOwnProperty.call(l, h) && s.append(h, l[h].toString());
  return (await fetch(
    `${t}/booking_poliklinik/api/booking_poliklinik/tambah_antrian`,
    {
      method: "POST",
      body: s
    }
  )).json();
}, yr = async (t, e, r) => {
  const n = new FormData();
  return n.append("id", e.toString()), n.append("kode_booking", r), (await fetch(
    `${t}/antrian_bpjs/api/antrian_bpjs/lakukan_checkin`,
    {
      method: "POST",
      body: n
    }
  )).json();
};
function _a() {
  const t = j(B);
  if (!t)
    throw new Error("AppState context not found");
  return gr({
    mutationFn: async (e) => {
      console.log("Step 1: Mendapatkan kode booking");
      const r = await vr(
        t.baseUrl.value,
        e
      );
      console.log("Step 2: Tambah antrian");
      const n = await mr(t.baseUrl.value, {
        ...r.metaData.response,
        is_antrian_loket: !0
      });
      return await yr(
        t.baseUrl.value,
        n.id_antrian,
        n.kode_booking
      ), console.log("Step 3: Lakukan checkin"), n;
    },
    onSuccess: (e) => {
      const r = window.innerWidth, n = window.innerHeight, o = window.screen.width / 2 - r / 2, i = window.screen.height / 2 - n / 2;
      window.open(
        `${t.baseUrl.value}/antrian_bpjs/cetak_antrian/${e.id_antrian}`,
        "Cetak Nomor Antrian Admisi",
        "width=" + r + ", height=" + n + ", left=" + o + ", top=" + i
      ), window.opener ? window.opener.postMessage("taskCompleteAndClose", "*") : console.log(
        "Cannot find window.opener. This window cannot close itself."
      );
    },
    onSettled: () => {
      t.usia.value = "Asuransi", t.currentView.value = "initial", t.poliklinik.value = null;
    }
  });
}
function Co(t) {
  var e, r, n = "";
  if (typeof t == "string" || typeof t == "number") n += t;
  else if (typeof t == "object") if (Array.isArray(t)) {
    var o = t.length;
    for (e = 0; e < o; e++) t[e] && (r = Co(t[e])) && (n && (n += " "), n += r);
  } else for (r in t) t[r] && (n && (n += " "), n += r);
  return n;
}
function So() {
  for (var t, e, r = 0, n = "", o = arguments.length; r < o; r++) (t = arguments[r]) && (e = Co(t)) && (n && (n += " "), n += e);
  return n;
}
const wr = "-", xa = (t) => {
  const e = Ca(t), {
    conflictingClassGroups: r,
    conflictingClassGroupModifiers: n
  } = t;
  return {
    getClassGroupId: (a) => {
      const s = a.split(wr);
      return s[0] === "" && s.length !== 1 && s.shift(), Mo(s, e) || ka(a);
    },
    getConflictingClassGroupIds: (a, s) => {
      const l = r[a] || [];
      return s && n[a] ? [...l, ...n[a]] : l;
    }
  };
}, Mo = (t, e) => {
  var a;
  if (t.length === 0)
    return e.classGroupId;
  const r = t[0], n = e.nextPart.get(r), o = n ? Mo(t.slice(1), n) : void 0;
  if (o)
    return o;
  if (e.validators.length === 0)
    return;
  const i = t.join(wr);
  return (a = e.validators.find(({
    validator: s
  }) => s(i))) == null ? void 0 : a.classGroupId;
}, on = /^\[(.+)\]$/, ka = (t) => {
  if (on.test(t)) {
    const e = on.exec(t)[1], r = e == null ? void 0 : e.substring(0, e.indexOf(":"));
    if (r)
      return "arbitrary.." + r;
  }
}, Ca = (t) => {
  const {
    theme: e,
    classGroups: r
  } = t, n = {
    nextPart: /* @__PURE__ */ new Map(),
    validators: []
  };
  for (const o in r)
    Ht(r[o], n, o, e);
  return n;
}, Ht = (t, e, r, n) => {
  t.forEach((o) => {
    if (typeof o == "string") {
      const i = o === "" ? e : an(e, o);
      i.classGroupId = r;
      return;
    }
    if (typeof o == "function") {
      if (Sa(o)) {
        Ht(o(n), e, r, n);
        return;
      }
      e.validators.push({
        validator: o,
        classGroupId: r
      });
      return;
    }
    Object.entries(o).forEach(([i, a]) => {
      Ht(a, an(e, i), r, n);
    });
  });
}, an = (t, e) => {
  let r = t;
  return e.split(wr).forEach((n) => {
    r.nextPart.has(n) || r.nextPart.set(n, {
      nextPart: /* @__PURE__ */ new Map(),
      validators: []
    }), r = r.nextPart.get(n);
  }), r;
}, Sa = (t) => t.isThemeGetter, Ma = (t) => {
  if (t < 1)
    return {
      get: () => {
      },
      set: () => {
      }
    };
  let e = 0, r = /* @__PURE__ */ new Map(), n = /* @__PURE__ */ new Map();
  const o = (i, a) => {
    r.set(i, a), e++, e > t && (e = 0, n = r, r = /* @__PURE__ */ new Map());
  };
  return {
    get(i) {
      let a = r.get(i);
      if (a !== void 0)
        return a;
      if ((a = n.get(i)) !== void 0)
        return o(i, a), a;
    },
    set(i, a) {
      r.has(i) ? r.set(i, a) : o(i, a);
    }
  };
}, Bt = "!", Vt = ":", Ra = Vt.length, Pa = (t) => {
  const {
    prefix: e,
    experimentalParseClassName: r
  } = t;
  let n = (o) => {
    const i = [];
    let a = 0, s = 0, l = 0, u;
    for (let g = 0; g < o.length; g++) {
      let y = o[g];
      if (a === 0 && s === 0) {
        if (y === Vt) {
          i.push(o.slice(l, g)), l = g + Ra;
          continue;
        }
        if (y === "/") {
          u = g;
          continue;
        }
      }
      y === "[" ? a++ : y === "]" ? a-- : y === "(" ? s++ : y === ")" && s--;
    }
    const h = i.length === 0 ? o : o.substring(l), c = Na(h), p = c !== h, f = u && u > l ? u - l : void 0;
    return {
      modifiers: i,
      hasImportantModifier: p,
      baseClassName: c,
      maybePostfixModifierPosition: f
    };
  };
  if (e) {
    const o = e + Vt, i = n;
    n = (a) => a.startsWith(o) ? i(a.substring(o.length)) : {
      isExternal: !0,
      modifiers: [],
      hasImportantModifier: !1,
      baseClassName: a,
      maybePostfixModifierPosition: void 0
    };
  }
  if (r) {
    const o = n;
    n = (i) => r({
      className: i,
      parseClassName: o
    });
  }
  return n;
}, Na = (t) => t.endsWith(Bt) ? t.substring(0, t.length - 1) : t.startsWith(Bt) ? t.substring(1) : t, Oa = (t) => {
  const e = Object.fromEntries(t.orderSensitiveModifiers.map((n) => [n, !0]));
  return (n) => {
    if (n.length <= 1)
      return n;
    const o = [];
    let i = [];
    return n.forEach((a) => {
      a[0] === "[" || e[a] ? (o.push(...i.sort(), a), i = []) : i.push(a);
    }), o.push(...i.sort()), o;
  };
}, Ea = (t) => ({
  cache: Ma(t.cacheSize),
  parseClassName: Pa(t),
  sortModifiers: Oa(t),
  ...xa(t)
}), Aa = /\s+/, $a = (t, e) => {
  const {
    parseClassName: r,
    getClassGroupId: n,
    getConflictingClassGroupIds: o,
    sortModifiers: i
  } = e, a = [], s = t.trim().split(Aa);
  let l = "";
  for (let u = s.length - 1; u >= 0; u -= 1) {
    const h = s[u], {
      isExternal: c,
      modifiers: p,
      hasImportantModifier: f,
      baseClassName: g,
      maybePostfixModifierPosition: y
    } = r(h);
    if (c) {
      l = h + (l.length > 0 ? " " + l : l);
      continue;
    }
    let m = !!y, w = n(m ? g.substring(0, y) : g);
    if (!w) {
      if (!m) {
        l = h + (l.length > 0 ? " " + l : l);
        continue;
      }
      if (w = n(g), !w) {
        l = h + (l.length > 0 ? " " + l : l);
        continue;
      }
      m = !1;
    }
    const x = i(p).join(":"), R = f ? x + Bt : x, N = R + w;
    if (a.includes(N))
      continue;
    a.push(N);
    const z = o(w, m);
    for (let S = 0; S < z.length; ++S) {
      const M = z[S];
      a.push(R + M);
    }
    l = h + (l.length > 0 ? " " + l : l);
  }
  return l;
};
function za() {
  let t = 0, e, r, n = "";
  for (; t < arguments.length; )
    (e = arguments[t++]) && (r = Ro(e)) && (n && (n += " "), n += r);
  return n;
}
const Ro = (t) => {
  if (typeof t == "string")
    return t;
  let e, r = "";
  for (let n = 0; n < t.length; n++)
    t[n] && (e = Ro(t[n])) && (r && (r += " "), r += e);
  return r;
};
function Ia(t, ...e) {
  let r, n, o, i = a;
  function a(l) {
    const u = e.reduce((h, c) => c(h), t());
    return r = Ea(u), n = r.cache.get, o = r.cache.set, i = s, s(l);
  }
  function s(l) {
    const u = n(l);
    if (u)
      return u;
    const h = $a(l, r);
    return o(l, h), h;
  }
  return function() {
    return i(za.apply(null, arguments));
  };
}
const D = (t) => {
  const e = (r) => r[t] || [];
  return e.isThemeGetter = !0, e;
}, Po = /^\[(?:(\w[\w-]*):)?(.+)\]$/i, No = /^\((?:(\w[\w-]*):)?(.+)\)$/i, Fa = /^\d+\/\d+$/, ja = /^(\d+(\.\d+)?)?(xs|sm|md|lg|xl)$/, Da = /\d+(%|px|r?em|[sdl]?v([hwib]|min|max)|pt|pc|in|cm|mm|cap|ch|ex|r?lh|cq(w|h|i|b|min|max))|\b(calc|min|max|clamp)\(.+\)|^0$/, Ta = /^(rgba?|hsla?|hwb|(ok)?(lab|lch)|color-mix)\(.+\)$/, Ua = /^(inset_)?-?((\d+)?\.?(\d+)[a-z]+|0)_-?((\d+)?\.?(\d+)[a-z]+|0)/, qa = /^(url|image|image-set|cross-fade|element|(repeating-)?(linear|radial|conic)-gradient)\(.+\)$/, _e = (t) => Fa.test(t), P = (t) => !!t && !Number.isNaN(Number(t)), ae = (t) => !!t && Number.isInteger(Number(t)), Ot = (t) => t.endsWith("%") && P(t.slice(0, -1)), ne = (t) => ja.test(t), La = () => !0, Qa = (t) => (
  // `colorFunctionRegex` check is necessary because color functions can have percentages in them which which would be incorrectly classified as lengths.
  // For example, `hsl(0 0% 0%)` would be classified as a length without this check.
  // I could also use lookbehind assertion in `lengthUnitRegex` but that isn't supported widely enough.
  Da.test(t) && !Ta.test(t)
), Oo = () => !1, Ha = (t) => Ua.test(t), Ba = (t) => qa.test(t), Va = (t) => !b(t) && !_(t), Ka = (t) => Ee(t, $o, Oo), b = (t) => Po.test(t), he = (t) => Ee(t, zo, Qa), Et = (t) => Ee(t, Ya, P), sn = (t) => Ee(t, Eo, Oo), Wa = (t) => Ee(t, Ao, Ba), rt = (t) => Ee(t, Io, Ha), _ = (t) => No.test(t), $e = (t) => Ae(t, zo), Ga = (t) => Ae(t, Xa), ln = (t) => Ae(t, Eo), Za = (t) => Ae(t, $o), Ja = (t) => Ae(t, Ao), nt = (t) => Ae(t, Io, !0), Ee = (t, e, r) => {
  const n = Po.exec(t);
  return n ? n[1] ? e(n[1]) : r(n[2]) : !1;
}, Ae = (t, e, r = !1) => {
  const n = No.exec(t);
  return n ? n[1] ? e(n[1]) : r : !1;
}, Eo = (t) => t === "position" || t === "percentage", Ao = (t) => t === "image" || t === "url", $o = (t) => t === "length" || t === "size" || t === "bg-size", zo = (t) => t === "length", Ya = (t) => t === "number", Xa = (t) => t === "family-name", Io = (t) => t === "shadow", es = () => {
  const t = D("color"), e = D("font"), r = D("text"), n = D("font-weight"), o = D("tracking"), i = D("leading"), a = D("breakpoint"), s = D("container"), l = D("spacing"), u = D("radius"), h = D("shadow"), c = D("inset-shadow"), p = D("text-shadow"), f = D("drop-shadow"), g = D("blur"), y = D("perspective"), m = D("aspect"), w = D("ease"), x = D("animate"), R = () => ["auto", "avoid", "all", "avoid-page", "page", "left", "right", "column"], N = () => [
    "center",
    "top",
    "bottom",
    "left",
    "right",
    "top-left",
    // Deprecated since Tailwind CSS v4.1.0, see https://github.com/tailwindlabs/tailwindcss/pull/17378
    "left-top",
    "top-right",
    // Deprecated since Tailwind CSS v4.1.0, see https://github.com/tailwindlabs/tailwindcss/pull/17378
    "right-top",
    "bottom-right",
    // Deprecated since Tailwind CSS v4.1.0, see https://github.com/tailwindlabs/tailwindcss/pull/17378
    "right-bottom",
    "bottom-left",
    // Deprecated since Tailwind CSS v4.1.0, see https://github.com/tailwindlabs/tailwindcss/pull/17378
    "left-bottom"
  ], z = () => [...N(), _, b], S = () => ["auto", "hidden", "clip", "visible", "scroll"], M = () => ["auto", "contain", "none"], v = () => [_, b, l], O = () => [_e, "full", "auto", ...v()], W = () => [ae, "none", "subgrid", _, b], U = () => ["auto", {
    span: ["full", ae, _, b]
  }, ae, _, b], J = () => [ae, "auto", _, b], Ke = () => ["auto", "min", "max", "fr", _, b], _t = () => ["start", "end", "center", "between", "around", "evenly", "stretch", "baseline", "center-safe", "end-safe"], be = () => ["start", "end", "center", "stretch", "center-safe", "end-safe"], te = () => ["auto", ...v()], ue = () => [_e, "auto", "full", "dvw", "dvh", "lvw", "lvh", "svw", "svh", "min", "max", "fit", ...v()], k = () => [t, _, b], _r = () => [...N(), ln, sn, {
    position: [_, b]
  }], xr = () => ["no-repeat", {
    repeat: ["", "x", "y", "space", "round"]
  }], kr = () => ["auto", "cover", "contain", Za, Ka, {
    size: [_, b]
  }], xt = () => [Ot, $e, he], L = () => [
    // Deprecated since Tailwind CSS v4.0.0
    "",
    "none",
    "full",
    u,
    _,
    b
  ], V = () => ["", P, $e, he], We = () => ["solid", "dashed", "dotted", "double"], Cr = () => ["normal", "multiply", "screen", "overlay", "darken", "lighten", "color-dodge", "color-burn", "hard-light", "soft-light", "difference", "exclusion", "hue", "saturation", "color", "luminosity"], T = () => [P, Ot, ln, sn], Sr = () => [
    // Deprecated since Tailwind CSS v4.0.0
    "",
    "none",
    g,
    _,
    b
  ], Ge = () => ["none", P, _, b], Ze = () => ["none", P, _, b], kt = () => [P, _, b], Je = () => [_e, "full", ...v()];
  return {
    cacheSize: 500,
    theme: {
      animate: ["spin", "ping", "pulse", "bounce"],
      aspect: ["video"],
      blur: [ne],
      breakpoint: [ne],
      color: [La],
      container: [ne],
      "drop-shadow": [ne],
      ease: ["in", "out", "in-out"],
      font: [Va],
      "font-weight": ["thin", "extralight", "light", "normal", "medium", "semibold", "bold", "extrabold", "black"],
      "inset-shadow": [ne],
      leading: ["none", "tight", "snug", "normal", "relaxed", "loose"],
      perspective: ["dramatic", "near", "normal", "midrange", "distant", "none"],
      radius: [ne],
      shadow: [ne],
      spacing: ["px", P],
      text: [ne],
      "text-shadow": [ne],
      tracking: ["tighter", "tight", "normal", "wide", "wider", "widest"]
    },
    classGroups: {
      // --------------
      // --- Layout ---
      // --------------
      /**
       * Aspect Ratio
       * @see https://tailwindcss.com/docs/aspect-ratio
       */
      aspect: [{
        aspect: ["auto", "square", _e, b, _, m]
      }],
      /**
       * Container
       * @see https://tailwindcss.com/docs/container
       * @deprecated since Tailwind CSS v4.0.0
       */
      container: ["container"],
      /**
       * Columns
       * @see https://tailwindcss.com/docs/columns
       */
      columns: [{
        columns: [P, b, _, s]
      }],
      /**
       * Break After
       * @see https://tailwindcss.com/docs/break-after
       */
      "break-after": [{
        "break-after": R()
      }],
      /**
       * Break Before
       * @see https://tailwindcss.com/docs/break-before
       */
      "break-before": [{
        "break-before": R()
      }],
      /**
       * Break Inside
       * @see https://tailwindcss.com/docs/break-inside
       */
      "break-inside": [{
        "break-inside": ["auto", "avoid", "avoid-page", "avoid-column"]
      }],
      /**
       * Box Decoration Break
       * @see https://tailwindcss.com/docs/box-decoration-break
       */
      "box-decoration": [{
        "box-decoration": ["slice", "clone"]
      }],
      /**
       * Box Sizing
       * @see https://tailwindcss.com/docs/box-sizing
       */
      box: [{
        box: ["border", "content"]
      }],
      /**
       * Display
       * @see https://tailwindcss.com/docs/display
       */
      display: ["block", "inline-block", "inline", "flex", "inline-flex", "table", "inline-table", "table-caption", "table-cell", "table-column", "table-column-group", "table-footer-group", "table-header-group", "table-row-group", "table-row", "flow-root", "grid", "inline-grid", "contents", "list-item", "hidden"],
      /**
       * Screen Reader Only
       * @see https://tailwindcss.com/docs/display#screen-reader-only
       */
      sr: ["sr-only", "not-sr-only"],
      /**
       * Floats
       * @see https://tailwindcss.com/docs/float
       */
      float: [{
        float: ["right", "left", "none", "start", "end"]
      }],
      /**
       * Clear
       * @see https://tailwindcss.com/docs/clear
       */
      clear: [{
        clear: ["left", "right", "both", "none", "start", "end"]
      }],
      /**
       * Isolation
       * @see https://tailwindcss.com/docs/isolation
       */
      isolation: ["isolate", "isolation-auto"],
      /**
       * Object Fit
       * @see https://tailwindcss.com/docs/object-fit
       */
      "object-fit": [{
        object: ["contain", "cover", "fill", "none", "scale-down"]
      }],
      /**
       * Object Position
       * @see https://tailwindcss.com/docs/object-position
       */
      "object-position": [{
        object: z()
      }],
      /**
       * Overflow
       * @see https://tailwindcss.com/docs/overflow
       */
      overflow: [{
        overflow: S()
      }],
      /**
       * Overflow X
       * @see https://tailwindcss.com/docs/overflow
       */
      "overflow-x": [{
        "overflow-x": S()
      }],
      /**
       * Overflow Y
       * @see https://tailwindcss.com/docs/overflow
       */
      "overflow-y": [{
        "overflow-y": S()
      }],
      /**
       * Overscroll Behavior
       * @see https://tailwindcss.com/docs/overscroll-behavior
       */
      overscroll: [{
        overscroll: M()
      }],
      /**
       * Overscroll Behavior X
       * @see https://tailwindcss.com/docs/overscroll-behavior
       */
      "overscroll-x": [{
        "overscroll-x": M()
      }],
      /**
       * Overscroll Behavior Y
       * @see https://tailwindcss.com/docs/overscroll-behavior
       */
      "overscroll-y": [{
        "overscroll-y": M()
      }],
      /**
       * Position
       * @see https://tailwindcss.com/docs/position
       */
      position: ["static", "fixed", "absolute", "relative", "sticky"],
      /**
       * Top / Right / Bottom / Left
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      inset: [{
        inset: O()
      }],
      /**
       * Right / Left
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      "inset-x": [{
        "inset-x": O()
      }],
      /**
       * Top / Bottom
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      "inset-y": [{
        "inset-y": O()
      }],
      /**
       * Start
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      start: [{
        start: O()
      }],
      /**
       * End
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      end: [{
        end: O()
      }],
      /**
       * Top
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      top: [{
        top: O()
      }],
      /**
       * Right
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      right: [{
        right: O()
      }],
      /**
       * Bottom
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      bottom: [{
        bottom: O()
      }],
      /**
       * Left
       * @see https://tailwindcss.com/docs/top-right-bottom-left
       */
      left: [{
        left: O()
      }],
      /**
       * Visibility
       * @see https://tailwindcss.com/docs/visibility
       */
      visibility: ["visible", "invisible", "collapse"],
      /**
       * Z-Index
       * @see https://tailwindcss.com/docs/z-index
       */
      z: [{
        z: [ae, "auto", _, b]
      }],
      // ------------------------
      // --- Flexbox and Grid ---
      // ------------------------
      /**
       * Flex Basis
       * @see https://tailwindcss.com/docs/flex-basis
       */
      basis: [{
        basis: [_e, "full", "auto", s, ...v()]
      }],
      /**
       * Flex Direction
       * @see https://tailwindcss.com/docs/flex-direction
       */
      "flex-direction": [{
        flex: ["row", "row-reverse", "col", "col-reverse"]
      }],
      /**
       * Flex Wrap
       * @see https://tailwindcss.com/docs/flex-wrap
       */
      "flex-wrap": [{
        flex: ["nowrap", "wrap", "wrap-reverse"]
      }],
      /**
       * Flex
       * @see https://tailwindcss.com/docs/flex
       */
      flex: [{
        flex: [P, _e, "auto", "initial", "none", b]
      }],
      /**
       * Flex Grow
       * @see https://tailwindcss.com/docs/flex-grow
       */
      grow: [{
        grow: ["", P, _, b]
      }],
      /**
       * Flex Shrink
       * @see https://tailwindcss.com/docs/flex-shrink
       */
      shrink: [{
        shrink: ["", P, _, b]
      }],
      /**
       * Order
       * @see https://tailwindcss.com/docs/order
       */
      order: [{
        order: [ae, "first", "last", "none", _, b]
      }],
      /**
       * Grid Template Columns
       * @see https://tailwindcss.com/docs/grid-template-columns
       */
      "grid-cols": [{
        "grid-cols": W()
      }],
      /**
       * Grid Column Start / End
       * @see https://tailwindcss.com/docs/grid-column
       */
      "col-start-end": [{
        col: U()
      }],
      /**
       * Grid Column Start
       * @see https://tailwindcss.com/docs/grid-column
       */
      "col-start": [{
        "col-start": J()
      }],
      /**
       * Grid Column End
       * @see https://tailwindcss.com/docs/grid-column
       */
      "col-end": [{
        "col-end": J()
      }],
      /**
       * Grid Template Rows
       * @see https://tailwindcss.com/docs/grid-template-rows
       */
      "grid-rows": [{
        "grid-rows": W()
      }],
      /**
       * Grid Row Start / End
       * @see https://tailwindcss.com/docs/grid-row
       */
      "row-start-end": [{
        row: U()
      }],
      /**
       * Grid Row Start
       * @see https://tailwindcss.com/docs/grid-row
       */
      "row-start": [{
        "row-start": J()
      }],
      /**
       * Grid Row End
       * @see https://tailwindcss.com/docs/grid-row
       */
      "row-end": [{
        "row-end": J()
      }],
      /**
       * Grid Auto Flow
       * @see https://tailwindcss.com/docs/grid-auto-flow
       */
      "grid-flow": [{
        "grid-flow": ["row", "col", "dense", "row-dense", "col-dense"]
      }],
      /**
       * Grid Auto Columns
       * @see https://tailwindcss.com/docs/grid-auto-columns
       */
      "auto-cols": [{
        "auto-cols": Ke()
      }],
      /**
       * Grid Auto Rows
       * @see https://tailwindcss.com/docs/grid-auto-rows
       */
      "auto-rows": [{
        "auto-rows": Ke()
      }],
      /**
       * Gap
       * @see https://tailwindcss.com/docs/gap
       */
      gap: [{
        gap: v()
      }],
      /**
       * Gap X
       * @see https://tailwindcss.com/docs/gap
       */
      "gap-x": [{
        "gap-x": v()
      }],
      /**
       * Gap Y
       * @see https://tailwindcss.com/docs/gap
       */
      "gap-y": [{
        "gap-y": v()
      }],
      /**
       * Justify Content
       * @see https://tailwindcss.com/docs/justify-content
       */
      "justify-content": [{
        justify: [..._t(), "normal"]
      }],
      /**
       * Justify Items
       * @see https://tailwindcss.com/docs/justify-items
       */
      "justify-items": [{
        "justify-items": [...be(), "normal"]
      }],
      /**
       * Justify Self
       * @see https://tailwindcss.com/docs/justify-self
       */
      "justify-self": [{
        "justify-self": ["auto", ...be()]
      }],
      /**
       * Align Content
       * @see https://tailwindcss.com/docs/align-content
       */
      "align-content": [{
        content: ["normal", ..._t()]
      }],
      /**
       * Align Items
       * @see https://tailwindcss.com/docs/align-items
       */
      "align-items": [{
        items: [...be(), {
          baseline: ["", "last"]
        }]
      }],
      /**
       * Align Self
       * @see https://tailwindcss.com/docs/align-self
       */
      "align-self": [{
        self: ["auto", ...be(), {
          baseline: ["", "last"]
        }]
      }],
      /**
       * Place Content
       * @see https://tailwindcss.com/docs/place-content
       */
      "place-content": [{
        "place-content": _t()
      }],
      /**
       * Place Items
       * @see https://tailwindcss.com/docs/place-items
       */
      "place-items": [{
        "place-items": [...be(), "baseline"]
      }],
      /**
       * Place Self
       * @see https://tailwindcss.com/docs/place-self
       */
      "place-self": [{
        "place-self": ["auto", ...be()]
      }],
      // Spacing
      /**
       * Padding
       * @see https://tailwindcss.com/docs/padding
       */
      p: [{
        p: v()
      }],
      /**
       * Padding X
       * @see https://tailwindcss.com/docs/padding
       */
      px: [{
        px: v()
      }],
      /**
       * Padding Y
       * @see https://tailwindcss.com/docs/padding
       */
      py: [{
        py: v()
      }],
      /**
       * Padding Start
       * @see https://tailwindcss.com/docs/padding
       */
      ps: [{
        ps: v()
      }],
      /**
       * Padding End
       * @see https://tailwindcss.com/docs/padding
       */
      pe: [{
        pe: v()
      }],
      /**
       * Padding Top
       * @see https://tailwindcss.com/docs/padding
       */
      pt: [{
        pt: v()
      }],
      /**
       * Padding Right
       * @see https://tailwindcss.com/docs/padding
       */
      pr: [{
        pr: v()
      }],
      /**
       * Padding Bottom
       * @see https://tailwindcss.com/docs/padding
       */
      pb: [{
        pb: v()
      }],
      /**
       * Padding Left
       * @see https://tailwindcss.com/docs/padding
       */
      pl: [{
        pl: v()
      }],
      /**
       * Margin
       * @see https://tailwindcss.com/docs/margin
       */
      m: [{
        m: te()
      }],
      /**
       * Margin X
       * @see https://tailwindcss.com/docs/margin
       */
      mx: [{
        mx: te()
      }],
      /**
       * Margin Y
       * @see https://tailwindcss.com/docs/margin
       */
      my: [{
        my: te()
      }],
      /**
       * Margin Start
       * @see https://tailwindcss.com/docs/margin
       */
      ms: [{
        ms: te()
      }],
      /**
       * Margin End
       * @see https://tailwindcss.com/docs/margin
       */
      me: [{
        me: te()
      }],
      /**
       * Margin Top
       * @see https://tailwindcss.com/docs/margin
       */
      mt: [{
        mt: te()
      }],
      /**
       * Margin Right
       * @see https://tailwindcss.com/docs/margin
       */
      mr: [{
        mr: te()
      }],
      /**
       * Margin Bottom
       * @see https://tailwindcss.com/docs/margin
       */
      mb: [{
        mb: te()
      }],
      /**
       * Margin Left
       * @see https://tailwindcss.com/docs/margin
       */
      ml: [{
        ml: te()
      }],
      /**
       * Space Between X
       * @see https://tailwindcss.com/docs/margin#adding-space-between-children
       */
      "space-x": [{
        "space-x": v()
      }],
      /**
       * Space Between X Reverse
       * @see https://tailwindcss.com/docs/margin#adding-space-between-children
       */
      "space-x-reverse": ["space-x-reverse"],
      /**
       * Space Between Y
       * @see https://tailwindcss.com/docs/margin#adding-space-between-children
       */
      "space-y": [{
        "space-y": v()
      }],
      /**
       * Space Between Y Reverse
       * @see https://tailwindcss.com/docs/margin#adding-space-between-children
       */
      "space-y-reverse": ["space-y-reverse"],
      // --------------
      // --- Sizing ---
      // --------------
      /**
       * Size
       * @see https://tailwindcss.com/docs/width#setting-both-width-and-height
       */
      size: [{
        size: ue()
      }],
      /**
       * Width
       * @see https://tailwindcss.com/docs/width
       */
      w: [{
        w: [s, "screen", ...ue()]
      }],
      /**
       * Min-Width
       * @see https://tailwindcss.com/docs/min-width
       */
      "min-w": [{
        "min-w": [
          s,
          "screen",
          /** Deprecated. @see https://github.com/tailwindlabs/tailwindcss.com/issues/2027#issuecomment-2620152757 */
          "none",
          ...ue()
        ]
      }],
      /**
       * Max-Width
       * @see https://tailwindcss.com/docs/max-width
       */
      "max-w": [{
        "max-w": [
          s,
          "screen",
          "none",
          /** Deprecated since Tailwind CSS v4.0.0. @see https://github.com/tailwindlabs/tailwindcss.com/issues/2027#issuecomment-2620152757 */
          "prose",
          /** Deprecated since Tailwind CSS v4.0.0. @see https://github.com/tailwindlabs/tailwindcss.com/issues/2027#issuecomment-2620152757 */
          {
            screen: [a]
          },
          ...ue()
        ]
      }],
      /**
       * Height
       * @see https://tailwindcss.com/docs/height
       */
      h: [{
        h: ["screen", "lh", ...ue()]
      }],
      /**
       * Min-Height
       * @see https://tailwindcss.com/docs/min-height
       */
      "min-h": [{
        "min-h": ["screen", "lh", "none", ...ue()]
      }],
      /**
       * Max-Height
       * @see https://tailwindcss.com/docs/max-height
       */
      "max-h": [{
        "max-h": ["screen", "lh", ...ue()]
      }],
      // ------------------
      // --- Typography ---
      // ------------------
      /**
       * Font Size
       * @see https://tailwindcss.com/docs/font-size
       */
      "font-size": [{
        text: ["base", r, $e, he]
      }],
      /**
       * Font Smoothing
       * @see https://tailwindcss.com/docs/font-smoothing
       */
      "font-smoothing": ["antialiased", "subpixel-antialiased"],
      /**
       * Font Style
       * @see https://tailwindcss.com/docs/font-style
       */
      "font-style": ["italic", "not-italic"],
      /**
       * Font Weight
       * @see https://tailwindcss.com/docs/font-weight
       */
      "font-weight": [{
        font: [n, _, Et]
      }],
      /**
       * Font Stretch
       * @see https://tailwindcss.com/docs/font-stretch
       */
      "font-stretch": [{
        "font-stretch": ["ultra-condensed", "extra-condensed", "condensed", "semi-condensed", "normal", "semi-expanded", "expanded", "extra-expanded", "ultra-expanded", Ot, b]
      }],
      /**
       * Font Family
       * @see https://tailwindcss.com/docs/font-family
       */
      "font-family": [{
        font: [Ga, b, e]
      }],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-normal": ["normal-nums"],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-ordinal": ["ordinal"],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-slashed-zero": ["slashed-zero"],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-figure": ["lining-nums", "oldstyle-nums"],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-spacing": ["proportional-nums", "tabular-nums"],
      /**
       * Font Variant Numeric
       * @see https://tailwindcss.com/docs/font-variant-numeric
       */
      "fvn-fraction": ["diagonal-fractions", "stacked-fractions"],
      /**
       * Letter Spacing
       * @see https://tailwindcss.com/docs/letter-spacing
       */
      tracking: [{
        tracking: [o, _, b]
      }],
      /**
       * Line Clamp
       * @see https://tailwindcss.com/docs/line-clamp
       */
      "line-clamp": [{
        "line-clamp": [P, "none", _, Et]
      }],
      /**
       * Line Height
       * @see https://tailwindcss.com/docs/line-height
       */
      leading: [{
        leading: [
          /** Deprecated since Tailwind CSS v4.0.0. @see https://github.com/tailwindlabs/tailwindcss.com/issues/2027#issuecomment-2620152757 */
          i,
          ...v()
        ]
      }],
      /**
       * List Style Image
       * @see https://tailwindcss.com/docs/list-style-image
       */
      "list-image": [{
        "list-image": ["none", _, b]
      }],
      /**
       * List Style Position
       * @see https://tailwindcss.com/docs/list-style-position
       */
      "list-style-position": [{
        list: ["inside", "outside"]
      }],
      /**
       * List Style Type
       * @see https://tailwindcss.com/docs/list-style-type
       */
      "list-style-type": [{
        list: ["disc", "decimal", "none", _, b]
      }],
      /**
       * Text Alignment
       * @see https://tailwindcss.com/docs/text-align
       */
      "text-alignment": [{
        text: ["left", "center", "right", "justify", "start", "end"]
      }],
      /**
       * Placeholder Color
       * @deprecated since Tailwind CSS v3.0.0
       * @see https://v3.tailwindcss.com/docs/placeholder-color
       */
      "placeholder-color": [{
        placeholder: k()
      }],
      /**
       * Text Color
       * @see https://tailwindcss.com/docs/text-color
       */
      "text-color": [{
        text: k()
      }],
      /**
       * Text Decoration
       * @see https://tailwindcss.com/docs/text-decoration
       */
      "text-decoration": ["underline", "overline", "line-through", "no-underline"],
      /**
       * Text Decoration Style
       * @see https://tailwindcss.com/docs/text-decoration-style
       */
      "text-decoration-style": [{
        decoration: [...We(), "wavy"]
      }],
      /**
       * Text Decoration Thickness
       * @see https://tailwindcss.com/docs/text-decoration-thickness
       */
      "text-decoration-thickness": [{
        decoration: [P, "from-font", "auto", _, he]
      }],
      /**
       * Text Decoration Color
       * @see https://tailwindcss.com/docs/text-decoration-color
       */
      "text-decoration-color": [{
        decoration: k()
      }],
      /**
       * Text Underline Offset
       * @see https://tailwindcss.com/docs/text-underline-offset
       */
      "underline-offset": [{
        "underline-offset": [P, "auto", _, b]
      }],
      /**
       * Text Transform
       * @see https://tailwindcss.com/docs/text-transform
       */
      "text-transform": ["uppercase", "lowercase", "capitalize", "normal-case"],
      /**
       * Text Overflow
       * @see https://tailwindcss.com/docs/text-overflow
       */
      "text-overflow": ["truncate", "text-ellipsis", "text-clip"],
      /**
       * Text Wrap
       * @see https://tailwindcss.com/docs/text-wrap
       */
      "text-wrap": [{
        text: ["wrap", "nowrap", "balance", "pretty"]
      }],
      /**
       * Text Indent
       * @see https://tailwindcss.com/docs/text-indent
       */
      indent: [{
        indent: v()
      }],
      /**
       * Vertical Alignment
       * @see https://tailwindcss.com/docs/vertical-align
       */
      "vertical-align": [{
        align: ["baseline", "top", "middle", "bottom", "text-top", "text-bottom", "sub", "super", _, b]
      }],
      /**
       * Whitespace
       * @see https://tailwindcss.com/docs/whitespace
       */
      whitespace: [{
        whitespace: ["normal", "nowrap", "pre", "pre-line", "pre-wrap", "break-spaces"]
      }],
      /**
       * Word Break
       * @see https://tailwindcss.com/docs/word-break
       */
      break: [{
        break: ["normal", "words", "all", "keep"]
      }],
      /**
       * Overflow Wrap
       * @see https://tailwindcss.com/docs/overflow-wrap
       */
      wrap: [{
        wrap: ["break-word", "anywhere", "normal"]
      }],
      /**
       * Hyphens
       * @see https://tailwindcss.com/docs/hyphens
       */
      hyphens: [{
        hyphens: ["none", "manual", "auto"]
      }],
      /**
       * Content
       * @see https://tailwindcss.com/docs/content
       */
      content: [{
        content: ["none", _, b]
      }],
      // -------------------
      // --- Backgrounds ---
      // -------------------
      /**
       * Background Attachment
       * @see https://tailwindcss.com/docs/background-attachment
       */
      "bg-attachment": [{
        bg: ["fixed", "local", "scroll"]
      }],
      /**
       * Background Clip
       * @see https://tailwindcss.com/docs/background-clip
       */
      "bg-clip": [{
        "bg-clip": ["border", "padding", "content", "text"]
      }],
      /**
       * Background Origin
       * @see https://tailwindcss.com/docs/background-origin
       */
      "bg-origin": [{
        "bg-origin": ["border", "padding", "content"]
      }],
      /**
       * Background Position
       * @see https://tailwindcss.com/docs/background-position
       */
      "bg-position": [{
        bg: _r()
      }],
      /**
       * Background Repeat
       * @see https://tailwindcss.com/docs/background-repeat
       */
      "bg-repeat": [{
        bg: xr()
      }],
      /**
       * Background Size
       * @see https://tailwindcss.com/docs/background-size
       */
      "bg-size": [{
        bg: kr()
      }],
      /**
       * Background Image
       * @see https://tailwindcss.com/docs/background-image
       */
      "bg-image": [{
        bg: ["none", {
          linear: [{
            to: ["t", "tr", "r", "br", "b", "bl", "l", "tl"]
          }, ae, _, b],
          radial: ["", _, b],
          conic: [ae, _, b]
        }, Ja, Wa]
      }],
      /**
       * Background Color
       * @see https://tailwindcss.com/docs/background-color
       */
      "bg-color": [{
        bg: k()
      }],
      /**
       * Gradient Color Stops From Position
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-from-pos": [{
        from: xt()
      }],
      /**
       * Gradient Color Stops Via Position
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-via-pos": [{
        via: xt()
      }],
      /**
       * Gradient Color Stops To Position
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-to-pos": [{
        to: xt()
      }],
      /**
       * Gradient Color Stops From
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-from": [{
        from: k()
      }],
      /**
       * Gradient Color Stops Via
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-via": [{
        via: k()
      }],
      /**
       * Gradient Color Stops To
       * @see https://tailwindcss.com/docs/gradient-color-stops
       */
      "gradient-to": [{
        to: k()
      }],
      // ---------------
      // --- Borders ---
      // ---------------
      /**
       * Border Radius
       * @see https://tailwindcss.com/docs/border-radius
       */
      rounded: [{
        rounded: L()
      }],
      /**
       * Border Radius Start
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-s": [{
        "rounded-s": L()
      }],
      /**
       * Border Radius End
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-e": [{
        "rounded-e": L()
      }],
      /**
       * Border Radius Top
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-t": [{
        "rounded-t": L()
      }],
      /**
       * Border Radius Right
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-r": [{
        "rounded-r": L()
      }],
      /**
       * Border Radius Bottom
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-b": [{
        "rounded-b": L()
      }],
      /**
       * Border Radius Left
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-l": [{
        "rounded-l": L()
      }],
      /**
       * Border Radius Start Start
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-ss": [{
        "rounded-ss": L()
      }],
      /**
       * Border Radius Start End
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-se": [{
        "rounded-se": L()
      }],
      /**
       * Border Radius End End
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-ee": [{
        "rounded-ee": L()
      }],
      /**
       * Border Radius End Start
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-es": [{
        "rounded-es": L()
      }],
      /**
       * Border Radius Top Left
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-tl": [{
        "rounded-tl": L()
      }],
      /**
       * Border Radius Top Right
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-tr": [{
        "rounded-tr": L()
      }],
      /**
       * Border Radius Bottom Right
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-br": [{
        "rounded-br": L()
      }],
      /**
       * Border Radius Bottom Left
       * @see https://tailwindcss.com/docs/border-radius
       */
      "rounded-bl": [{
        "rounded-bl": L()
      }],
      /**
       * Border Width
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w": [{
        border: V()
      }],
      /**
       * Border Width X
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-x": [{
        "border-x": V()
      }],
      /**
       * Border Width Y
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-y": [{
        "border-y": V()
      }],
      /**
       * Border Width Start
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-s": [{
        "border-s": V()
      }],
      /**
       * Border Width End
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-e": [{
        "border-e": V()
      }],
      /**
       * Border Width Top
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-t": [{
        "border-t": V()
      }],
      /**
       * Border Width Right
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-r": [{
        "border-r": V()
      }],
      /**
       * Border Width Bottom
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-b": [{
        "border-b": V()
      }],
      /**
       * Border Width Left
       * @see https://tailwindcss.com/docs/border-width
       */
      "border-w-l": [{
        "border-l": V()
      }],
      /**
       * Divide Width X
       * @see https://tailwindcss.com/docs/border-width#between-children
       */
      "divide-x": [{
        "divide-x": V()
      }],
      /**
       * Divide Width X Reverse
       * @see https://tailwindcss.com/docs/border-width#between-children
       */
      "divide-x-reverse": ["divide-x-reverse"],
      /**
       * Divide Width Y
       * @see https://tailwindcss.com/docs/border-width#between-children
       */
      "divide-y": [{
        "divide-y": V()
      }],
      /**
       * Divide Width Y Reverse
       * @see https://tailwindcss.com/docs/border-width#between-children
       */
      "divide-y-reverse": ["divide-y-reverse"],
      /**
       * Border Style
       * @see https://tailwindcss.com/docs/border-style
       */
      "border-style": [{
        border: [...We(), "hidden", "none"]
      }],
      /**
       * Divide Style
       * @see https://tailwindcss.com/docs/border-style#setting-the-divider-style
       */
      "divide-style": [{
        divide: [...We(), "hidden", "none"]
      }],
      /**
       * Border Color
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color": [{
        border: k()
      }],
      /**
       * Border Color X
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-x": [{
        "border-x": k()
      }],
      /**
       * Border Color Y
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-y": [{
        "border-y": k()
      }],
      /**
       * Border Color S
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-s": [{
        "border-s": k()
      }],
      /**
       * Border Color E
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-e": [{
        "border-e": k()
      }],
      /**
       * Border Color Top
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-t": [{
        "border-t": k()
      }],
      /**
       * Border Color Right
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-r": [{
        "border-r": k()
      }],
      /**
       * Border Color Bottom
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-b": [{
        "border-b": k()
      }],
      /**
       * Border Color Left
       * @see https://tailwindcss.com/docs/border-color
       */
      "border-color-l": [{
        "border-l": k()
      }],
      /**
       * Divide Color
       * @see https://tailwindcss.com/docs/divide-color
       */
      "divide-color": [{
        divide: k()
      }],
      /**
       * Outline Style
       * @see https://tailwindcss.com/docs/outline-style
       */
      "outline-style": [{
        outline: [...We(), "none", "hidden"]
      }],
      /**
       * Outline Offset
       * @see https://tailwindcss.com/docs/outline-offset
       */
      "outline-offset": [{
        "outline-offset": [P, _, b]
      }],
      /**
       * Outline Width
       * @see https://tailwindcss.com/docs/outline-width
       */
      "outline-w": [{
        outline: ["", P, $e, he]
      }],
      /**
       * Outline Color
       * @see https://tailwindcss.com/docs/outline-color
       */
      "outline-color": [{
        outline: k()
      }],
      // ---------------
      // --- Effects ---
      // ---------------
      /**
       * Box Shadow
       * @see https://tailwindcss.com/docs/box-shadow
       */
      shadow: [{
        shadow: [
          // Deprecated since Tailwind CSS v4.0.0
          "",
          "none",
          h,
          nt,
          rt
        ]
      }],
      /**
       * Box Shadow Color
       * @see https://tailwindcss.com/docs/box-shadow#setting-the-shadow-color
       */
      "shadow-color": [{
        shadow: k()
      }],
      /**
       * Inset Box Shadow
       * @see https://tailwindcss.com/docs/box-shadow#adding-an-inset-shadow
       */
      "inset-shadow": [{
        "inset-shadow": ["none", c, nt, rt]
      }],
      /**
       * Inset Box Shadow Color
       * @see https://tailwindcss.com/docs/box-shadow#setting-the-inset-shadow-color
       */
      "inset-shadow-color": [{
        "inset-shadow": k()
      }],
      /**
       * Ring Width
       * @see https://tailwindcss.com/docs/box-shadow#adding-a-ring
       */
      "ring-w": [{
        ring: V()
      }],
      /**
       * Ring Width Inset
       * @see https://v3.tailwindcss.com/docs/ring-width#inset-rings
       * @deprecated since Tailwind CSS v4.0.0
       * @see https://github.com/tailwindlabs/tailwindcss/blob/v4.0.0/packages/tailwindcss/src/utilities.ts#L4158
       */
      "ring-w-inset": ["ring-inset"],
      /**
       * Ring Color
       * @see https://tailwindcss.com/docs/box-shadow#setting-the-ring-color
       */
      "ring-color": [{
        ring: k()
      }],
      /**
       * Ring Offset Width
       * @see https://v3.tailwindcss.com/docs/ring-offset-width
       * @deprecated since Tailwind CSS v4.0.0
       * @see https://github.com/tailwindlabs/tailwindcss/blob/v4.0.0/packages/tailwindcss/src/utilities.ts#L4158
       */
      "ring-offset-w": [{
        "ring-offset": [P, he]
      }],
      /**
       * Ring Offset Color
       * @see https://v3.tailwindcss.com/docs/ring-offset-color
       * @deprecated since Tailwind CSS v4.0.0
       * @see https://github.com/tailwindlabs/tailwindcss/blob/v4.0.0/packages/tailwindcss/src/utilities.ts#L4158
       */
      "ring-offset-color": [{
        "ring-offset": k()
      }],
      /**
       * Inset Ring Width
       * @see https://tailwindcss.com/docs/box-shadow#adding-an-inset-ring
       */
      "inset-ring-w": [{
        "inset-ring": V()
      }],
      /**
       * Inset Ring Color
       * @see https://tailwindcss.com/docs/box-shadow#setting-the-inset-ring-color
       */
      "inset-ring-color": [{
        "inset-ring": k()
      }],
      /**
       * Text Shadow
       * @see https://tailwindcss.com/docs/text-shadow
       */
      "text-shadow": [{
        "text-shadow": ["none", p, nt, rt]
      }],
      /**
       * Text Shadow Color
       * @see https://tailwindcss.com/docs/text-shadow#setting-the-shadow-color
       */
      "text-shadow-color": [{
        "text-shadow": k()
      }],
      /**
       * Opacity
       * @see https://tailwindcss.com/docs/opacity
       */
      opacity: [{
        opacity: [P, _, b]
      }],
      /**
       * Mix Blend Mode
       * @see https://tailwindcss.com/docs/mix-blend-mode
       */
      "mix-blend": [{
        "mix-blend": [...Cr(), "plus-darker", "plus-lighter"]
      }],
      /**
       * Background Blend Mode
       * @see https://tailwindcss.com/docs/background-blend-mode
       */
      "bg-blend": [{
        "bg-blend": Cr()
      }],
      /**
       * Mask Clip
       * @see https://tailwindcss.com/docs/mask-clip
       */
      "mask-clip": [{
        "mask-clip": ["border", "padding", "content", "fill", "stroke", "view"]
      }, "mask-no-clip"],
      /**
       * Mask Composite
       * @see https://tailwindcss.com/docs/mask-composite
       */
      "mask-composite": [{
        mask: ["add", "subtract", "intersect", "exclude"]
      }],
      /**
       * Mask Image
       * @see https://tailwindcss.com/docs/mask-image
       */
      "mask-image-linear-pos": [{
        "mask-linear": [P]
      }],
      "mask-image-linear-from-pos": [{
        "mask-linear-from": T()
      }],
      "mask-image-linear-to-pos": [{
        "mask-linear-to": T()
      }],
      "mask-image-linear-from-color": [{
        "mask-linear-from": k()
      }],
      "mask-image-linear-to-color": [{
        "mask-linear-to": k()
      }],
      "mask-image-t-from-pos": [{
        "mask-t-from": T()
      }],
      "mask-image-t-to-pos": [{
        "mask-t-to": T()
      }],
      "mask-image-t-from-color": [{
        "mask-t-from": k()
      }],
      "mask-image-t-to-color": [{
        "mask-t-to": k()
      }],
      "mask-image-r-from-pos": [{
        "mask-r-from": T()
      }],
      "mask-image-r-to-pos": [{
        "mask-r-to": T()
      }],
      "mask-image-r-from-color": [{
        "mask-r-from": k()
      }],
      "mask-image-r-to-color": [{
        "mask-r-to": k()
      }],
      "mask-image-b-from-pos": [{
        "mask-b-from": T()
      }],
      "mask-image-b-to-pos": [{
        "mask-b-to": T()
      }],
      "mask-image-b-from-color": [{
        "mask-b-from": k()
      }],
      "mask-image-b-to-color": [{
        "mask-b-to": k()
      }],
      "mask-image-l-from-pos": [{
        "mask-l-from": T()
      }],
      "mask-image-l-to-pos": [{
        "mask-l-to": T()
      }],
      "mask-image-l-from-color": [{
        "mask-l-from": k()
      }],
      "mask-image-l-to-color": [{
        "mask-l-to": k()
      }],
      "mask-image-x-from-pos": [{
        "mask-x-from": T()
      }],
      "mask-image-x-to-pos": [{
        "mask-x-to": T()
      }],
      "mask-image-x-from-color": [{
        "mask-x-from": k()
      }],
      "mask-image-x-to-color": [{
        "mask-x-to": k()
      }],
      "mask-image-y-from-pos": [{
        "mask-y-from": T()
      }],
      "mask-image-y-to-pos": [{
        "mask-y-to": T()
      }],
      "mask-image-y-from-color": [{
        "mask-y-from": k()
      }],
      "mask-image-y-to-color": [{
        "mask-y-to": k()
      }],
      "mask-image-radial": [{
        "mask-radial": [_, b]
      }],
      "mask-image-radial-from-pos": [{
        "mask-radial-from": T()
      }],
      "mask-image-radial-to-pos": [{
        "mask-radial-to": T()
      }],
      "mask-image-radial-from-color": [{
        "mask-radial-from": k()
      }],
      "mask-image-radial-to-color": [{
        "mask-radial-to": k()
      }],
      "mask-image-radial-shape": [{
        "mask-radial": ["circle", "ellipse"]
      }],
      "mask-image-radial-size": [{
        "mask-radial": [{
          closest: ["side", "corner"],
          farthest: ["side", "corner"]
        }]
      }],
      "mask-image-radial-pos": [{
        "mask-radial-at": N()
      }],
      "mask-image-conic-pos": [{
        "mask-conic": [P]
      }],
      "mask-image-conic-from-pos": [{
        "mask-conic-from": T()
      }],
      "mask-image-conic-to-pos": [{
        "mask-conic-to": T()
      }],
      "mask-image-conic-from-color": [{
        "mask-conic-from": k()
      }],
      "mask-image-conic-to-color": [{
        "mask-conic-to": k()
      }],
      /**
       * Mask Mode
       * @see https://tailwindcss.com/docs/mask-mode
       */
      "mask-mode": [{
        mask: ["alpha", "luminance", "match"]
      }],
      /**
       * Mask Origin
       * @see https://tailwindcss.com/docs/mask-origin
       */
      "mask-origin": [{
        "mask-origin": ["border", "padding", "content", "fill", "stroke", "view"]
      }],
      /**
       * Mask Position
       * @see https://tailwindcss.com/docs/mask-position
       */
      "mask-position": [{
        mask: _r()
      }],
      /**
       * Mask Repeat
       * @see https://tailwindcss.com/docs/mask-repeat
       */
      "mask-repeat": [{
        mask: xr()
      }],
      /**
       * Mask Size
       * @see https://tailwindcss.com/docs/mask-size
       */
      "mask-size": [{
        mask: kr()
      }],
      /**
       * Mask Type
       * @see https://tailwindcss.com/docs/mask-type
       */
      "mask-type": [{
        "mask-type": ["alpha", "luminance"]
      }],
      /**
       * Mask Image
       * @see https://tailwindcss.com/docs/mask-image
       */
      "mask-image": [{
        mask: ["none", _, b]
      }],
      // ---------------
      // --- Filters ---
      // ---------------
      /**
       * Filter
       * @see https://tailwindcss.com/docs/filter
       */
      filter: [{
        filter: [
          // Deprecated since Tailwind CSS v3.0.0
          "",
          "none",
          _,
          b
        ]
      }],
      /**
       * Blur
       * @see https://tailwindcss.com/docs/blur
       */
      blur: [{
        blur: Sr()
      }],
      /**
       * Brightness
       * @see https://tailwindcss.com/docs/brightness
       */
      brightness: [{
        brightness: [P, _, b]
      }],
      /**
       * Contrast
       * @see https://tailwindcss.com/docs/contrast
       */
      contrast: [{
        contrast: [P, _, b]
      }],
      /**
       * Drop Shadow
       * @see https://tailwindcss.com/docs/drop-shadow
       */
      "drop-shadow": [{
        "drop-shadow": [
          // Deprecated since Tailwind CSS v4.0.0
          "",
          "none",
          f,
          nt,
          rt
        ]
      }],
      /**
       * Drop Shadow Color
       * @see https://tailwindcss.com/docs/filter-drop-shadow#setting-the-shadow-color
       */
      "drop-shadow-color": [{
        "drop-shadow": k()
      }],
      /**
       * Grayscale
       * @see https://tailwindcss.com/docs/grayscale
       */
      grayscale: [{
        grayscale: ["", P, _, b]
      }],
      /**
       * Hue Rotate
       * @see https://tailwindcss.com/docs/hue-rotate
       */
      "hue-rotate": [{
        "hue-rotate": [P, _, b]
      }],
      /**
       * Invert
       * @see https://tailwindcss.com/docs/invert
       */
      invert: [{
        invert: ["", P, _, b]
      }],
      /**
       * Saturate
       * @see https://tailwindcss.com/docs/saturate
       */
      saturate: [{
        saturate: [P, _, b]
      }],
      /**
       * Sepia
       * @see https://tailwindcss.com/docs/sepia
       */
      sepia: [{
        sepia: ["", P, _, b]
      }],
      /**
       * Backdrop Filter
       * @see https://tailwindcss.com/docs/backdrop-filter
       */
      "backdrop-filter": [{
        "backdrop-filter": [
          // Deprecated since Tailwind CSS v3.0.0
          "",
          "none",
          _,
          b
        ]
      }],
      /**
       * Backdrop Blur
       * @see https://tailwindcss.com/docs/backdrop-blur
       */
      "backdrop-blur": [{
        "backdrop-blur": Sr()
      }],
      /**
       * Backdrop Brightness
       * @see https://tailwindcss.com/docs/backdrop-brightness
       */
      "backdrop-brightness": [{
        "backdrop-brightness": [P, _, b]
      }],
      /**
       * Backdrop Contrast
       * @see https://tailwindcss.com/docs/backdrop-contrast
       */
      "backdrop-contrast": [{
        "backdrop-contrast": [P, _, b]
      }],
      /**
       * Backdrop Grayscale
       * @see https://tailwindcss.com/docs/backdrop-grayscale
       */
      "backdrop-grayscale": [{
        "backdrop-grayscale": ["", P, _, b]
      }],
      /**
       * Backdrop Hue Rotate
       * @see https://tailwindcss.com/docs/backdrop-hue-rotate
       */
      "backdrop-hue-rotate": [{
        "backdrop-hue-rotate": [P, _, b]
      }],
      /**
       * Backdrop Invert
       * @see https://tailwindcss.com/docs/backdrop-invert
       */
      "backdrop-invert": [{
        "backdrop-invert": ["", P, _, b]
      }],
      /**
       * Backdrop Opacity
       * @see https://tailwindcss.com/docs/backdrop-opacity
       */
      "backdrop-opacity": [{
        "backdrop-opacity": [P, _, b]
      }],
      /**
       * Backdrop Saturate
       * @see https://tailwindcss.com/docs/backdrop-saturate
       */
      "backdrop-saturate": [{
        "backdrop-saturate": [P, _, b]
      }],
      /**
       * Backdrop Sepia
       * @see https://tailwindcss.com/docs/backdrop-sepia
       */
      "backdrop-sepia": [{
        "backdrop-sepia": ["", P, _, b]
      }],
      // --------------
      // --- Tables ---
      // --------------
      /**
       * Border Collapse
       * @see https://tailwindcss.com/docs/border-collapse
       */
      "border-collapse": [{
        border: ["collapse", "separate"]
      }],
      /**
       * Border Spacing
       * @see https://tailwindcss.com/docs/border-spacing
       */
      "border-spacing": [{
        "border-spacing": v()
      }],
      /**
       * Border Spacing X
       * @see https://tailwindcss.com/docs/border-spacing
       */
      "border-spacing-x": [{
        "border-spacing-x": v()
      }],
      /**
       * Border Spacing Y
       * @see https://tailwindcss.com/docs/border-spacing
       */
      "border-spacing-y": [{
        "border-spacing-y": v()
      }],
      /**
       * Table Layout
       * @see https://tailwindcss.com/docs/table-layout
       */
      "table-layout": [{
        table: ["auto", "fixed"]
      }],
      /**
       * Caption Side
       * @see https://tailwindcss.com/docs/caption-side
       */
      caption: [{
        caption: ["top", "bottom"]
      }],
      // ---------------------------------
      // --- Transitions and Animation ---
      // ---------------------------------
      /**
       * Transition Property
       * @see https://tailwindcss.com/docs/transition-property
       */
      transition: [{
        transition: ["", "all", "colors", "opacity", "shadow", "transform", "none", _, b]
      }],
      /**
       * Transition Behavior
       * @see https://tailwindcss.com/docs/transition-behavior
       */
      "transition-behavior": [{
        transition: ["normal", "discrete"]
      }],
      /**
       * Transition Duration
       * @see https://tailwindcss.com/docs/transition-duration
       */
      duration: [{
        duration: [P, "initial", _, b]
      }],
      /**
       * Transition Timing Function
       * @see https://tailwindcss.com/docs/transition-timing-function
       */
      ease: [{
        ease: ["linear", "initial", w, _, b]
      }],
      /**
       * Transition Delay
       * @see https://tailwindcss.com/docs/transition-delay
       */
      delay: [{
        delay: [P, _, b]
      }],
      /**
       * Animation
       * @see https://tailwindcss.com/docs/animation
       */
      animate: [{
        animate: ["none", x, _, b]
      }],
      // ------------------
      // --- Transforms ---
      // ------------------
      /**
       * Backface Visibility
       * @see https://tailwindcss.com/docs/backface-visibility
       */
      backface: [{
        backface: ["hidden", "visible"]
      }],
      /**
       * Perspective
       * @see https://tailwindcss.com/docs/perspective
       */
      perspective: [{
        perspective: [y, _, b]
      }],
      /**
       * Perspective Origin
       * @see https://tailwindcss.com/docs/perspective-origin
       */
      "perspective-origin": [{
        "perspective-origin": z()
      }],
      /**
       * Rotate
       * @see https://tailwindcss.com/docs/rotate
       */
      rotate: [{
        rotate: Ge()
      }],
      /**
       * Rotate X
       * @see https://tailwindcss.com/docs/rotate
       */
      "rotate-x": [{
        "rotate-x": Ge()
      }],
      /**
       * Rotate Y
       * @see https://tailwindcss.com/docs/rotate
       */
      "rotate-y": [{
        "rotate-y": Ge()
      }],
      /**
       * Rotate Z
       * @see https://tailwindcss.com/docs/rotate
       */
      "rotate-z": [{
        "rotate-z": Ge()
      }],
      /**
       * Scale
       * @see https://tailwindcss.com/docs/scale
       */
      scale: [{
        scale: Ze()
      }],
      /**
       * Scale X
       * @see https://tailwindcss.com/docs/scale
       */
      "scale-x": [{
        "scale-x": Ze()
      }],
      /**
       * Scale Y
       * @see https://tailwindcss.com/docs/scale
       */
      "scale-y": [{
        "scale-y": Ze()
      }],
      /**
       * Scale Z
       * @see https://tailwindcss.com/docs/scale
       */
      "scale-z": [{
        "scale-z": Ze()
      }],
      /**
       * Scale 3D
       * @see https://tailwindcss.com/docs/scale
       */
      "scale-3d": ["scale-3d"],
      /**
       * Skew
       * @see https://tailwindcss.com/docs/skew
       */
      skew: [{
        skew: kt()
      }],
      /**
       * Skew X
       * @see https://tailwindcss.com/docs/skew
       */
      "skew-x": [{
        "skew-x": kt()
      }],
      /**
       * Skew Y
       * @see https://tailwindcss.com/docs/skew
       */
      "skew-y": [{
        "skew-y": kt()
      }],
      /**
       * Transform
       * @see https://tailwindcss.com/docs/transform
       */
      transform: [{
        transform: [_, b, "", "none", "gpu", "cpu"]
      }],
      /**
       * Transform Origin
       * @see https://tailwindcss.com/docs/transform-origin
       */
      "transform-origin": [{
        origin: z()
      }],
      /**
       * Transform Style
       * @see https://tailwindcss.com/docs/transform-style
       */
      "transform-style": [{
        transform: ["3d", "flat"]
      }],
      /**
       * Translate
       * @see https://tailwindcss.com/docs/translate
       */
      translate: [{
        translate: Je()
      }],
      /**
       * Translate X
       * @see https://tailwindcss.com/docs/translate
       */
      "translate-x": [{
        "translate-x": Je()
      }],
      /**
       * Translate Y
       * @see https://tailwindcss.com/docs/translate
       */
      "translate-y": [{
        "translate-y": Je()
      }],
      /**
       * Translate Z
       * @see https://tailwindcss.com/docs/translate
       */
      "translate-z": [{
        "translate-z": Je()
      }],
      /**
       * Translate None
       * @see https://tailwindcss.com/docs/translate
       */
      "translate-none": ["translate-none"],
      // ---------------------
      // --- Interactivity ---
      // ---------------------
      /**
       * Accent Color
       * @see https://tailwindcss.com/docs/accent-color
       */
      accent: [{
        accent: k()
      }],
      /**
       * Appearance
       * @see https://tailwindcss.com/docs/appearance
       */
      appearance: [{
        appearance: ["none", "auto"]
      }],
      /**
       * Caret Color
       * @see https://tailwindcss.com/docs/just-in-time-mode#caret-color-utilities
       */
      "caret-color": [{
        caret: k()
      }],
      /**
       * Color Scheme
       * @see https://tailwindcss.com/docs/color-scheme
       */
      "color-scheme": [{
        scheme: ["normal", "dark", "light", "light-dark", "only-dark", "only-light"]
      }],
      /**
       * Cursor
       * @see https://tailwindcss.com/docs/cursor
       */
      cursor: [{
        cursor: ["auto", "default", "pointer", "wait", "text", "move", "help", "not-allowed", "none", "context-menu", "progress", "cell", "crosshair", "vertical-text", "alias", "copy", "no-drop", "grab", "grabbing", "all-scroll", "col-resize", "row-resize", "n-resize", "e-resize", "s-resize", "w-resize", "ne-resize", "nw-resize", "se-resize", "sw-resize", "ew-resize", "ns-resize", "nesw-resize", "nwse-resize", "zoom-in", "zoom-out", _, b]
      }],
      /**
       * Field Sizing
       * @see https://tailwindcss.com/docs/field-sizing
       */
      "field-sizing": [{
        "field-sizing": ["fixed", "content"]
      }],
      /**
       * Pointer Events
       * @see https://tailwindcss.com/docs/pointer-events
       */
      "pointer-events": [{
        "pointer-events": ["auto", "none"]
      }],
      /**
       * Resize
       * @see https://tailwindcss.com/docs/resize
       */
      resize: [{
        resize: ["none", "", "y", "x"]
      }],
      /**
       * Scroll Behavior
       * @see https://tailwindcss.com/docs/scroll-behavior
       */
      "scroll-behavior": [{
        scroll: ["auto", "smooth"]
      }],
      /**
       * Scroll Margin
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-m": [{
        "scroll-m": v()
      }],
      /**
       * Scroll Margin X
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-mx": [{
        "scroll-mx": v()
      }],
      /**
       * Scroll Margin Y
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-my": [{
        "scroll-my": v()
      }],
      /**
       * Scroll Margin Start
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-ms": [{
        "scroll-ms": v()
      }],
      /**
       * Scroll Margin End
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-me": [{
        "scroll-me": v()
      }],
      /**
       * Scroll Margin Top
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-mt": [{
        "scroll-mt": v()
      }],
      /**
       * Scroll Margin Right
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-mr": [{
        "scroll-mr": v()
      }],
      /**
       * Scroll Margin Bottom
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-mb": [{
        "scroll-mb": v()
      }],
      /**
       * Scroll Margin Left
       * @see https://tailwindcss.com/docs/scroll-margin
       */
      "scroll-ml": [{
        "scroll-ml": v()
      }],
      /**
       * Scroll Padding
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-p": [{
        "scroll-p": v()
      }],
      /**
       * Scroll Padding X
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-px": [{
        "scroll-px": v()
      }],
      /**
       * Scroll Padding Y
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-py": [{
        "scroll-py": v()
      }],
      /**
       * Scroll Padding Start
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-ps": [{
        "scroll-ps": v()
      }],
      /**
       * Scroll Padding End
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-pe": [{
        "scroll-pe": v()
      }],
      /**
       * Scroll Padding Top
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-pt": [{
        "scroll-pt": v()
      }],
      /**
       * Scroll Padding Right
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-pr": [{
        "scroll-pr": v()
      }],
      /**
       * Scroll Padding Bottom
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-pb": [{
        "scroll-pb": v()
      }],
      /**
       * Scroll Padding Left
       * @see https://tailwindcss.com/docs/scroll-padding
       */
      "scroll-pl": [{
        "scroll-pl": v()
      }],
      /**
       * Scroll Snap Align
       * @see https://tailwindcss.com/docs/scroll-snap-align
       */
      "snap-align": [{
        snap: ["start", "end", "center", "align-none"]
      }],
      /**
       * Scroll Snap Stop
       * @see https://tailwindcss.com/docs/scroll-snap-stop
       */
      "snap-stop": [{
        snap: ["normal", "always"]
      }],
      /**
       * Scroll Snap Type
       * @see https://tailwindcss.com/docs/scroll-snap-type
       */
      "snap-type": [{
        snap: ["none", "x", "y", "both"]
      }],
      /**
       * Scroll Snap Type Strictness
       * @see https://tailwindcss.com/docs/scroll-snap-type
       */
      "snap-strictness": [{
        snap: ["mandatory", "proximity"]
      }],
      /**
       * Touch Action
       * @see https://tailwindcss.com/docs/touch-action
       */
      touch: [{
        touch: ["auto", "none", "manipulation"]
      }],
      /**
       * Touch Action X
       * @see https://tailwindcss.com/docs/touch-action
       */
      "touch-x": [{
        "touch-pan": ["x", "left", "right"]
      }],
      /**
       * Touch Action Y
       * @see https://tailwindcss.com/docs/touch-action
       */
      "touch-y": [{
        "touch-pan": ["y", "up", "down"]
      }],
      /**
       * Touch Action Pinch Zoom
       * @see https://tailwindcss.com/docs/touch-action
       */
      "touch-pz": ["touch-pinch-zoom"],
      /**
       * User Select
       * @see https://tailwindcss.com/docs/user-select
       */
      select: [{
        select: ["none", "text", "all", "auto"]
      }],
      /**
       * Will Change
       * @see https://tailwindcss.com/docs/will-change
       */
      "will-change": [{
        "will-change": ["auto", "scroll", "contents", "transform", _, b]
      }],
      // -----------
      // --- SVG ---
      // -----------
      /**
       * Fill
       * @see https://tailwindcss.com/docs/fill
       */
      fill: [{
        fill: ["none", ...k()]
      }],
      /**
       * Stroke Width
       * @see https://tailwindcss.com/docs/stroke-width
       */
      "stroke-w": [{
        stroke: [P, $e, he, Et]
      }],
      /**
       * Stroke
       * @see https://tailwindcss.com/docs/stroke
       */
      stroke: [{
        stroke: ["none", ...k()]
      }],
      // ---------------------
      // --- Accessibility ---
      // ---------------------
      /**
       * Forced Color Adjust
       * @see https://tailwindcss.com/docs/forced-color-adjust
       */
      "forced-color-adjust": [{
        "forced-color-adjust": ["auto", "none"]
      }]
    },
    conflictingClassGroups: {
      overflow: ["overflow-x", "overflow-y"],
      overscroll: ["overscroll-x", "overscroll-y"],
      inset: ["inset-x", "inset-y", "start", "end", "top", "right", "bottom", "left"],
      "inset-x": ["right", "left"],
      "inset-y": ["top", "bottom"],
      flex: ["basis", "grow", "shrink"],
      gap: ["gap-x", "gap-y"],
      p: ["px", "py", "ps", "pe", "pt", "pr", "pb", "pl"],
      px: ["pr", "pl"],
      py: ["pt", "pb"],
      m: ["mx", "my", "ms", "me", "mt", "mr", "mb", "ml"],
      mx: ["mr", "ml"],
      my: ["mt", "mb"],
      size: ["w", "h"],
      "font-size": ["leading"],
      "fvn-normal": ["fvn-ordinal", "fvn-slashed-zero", "fvn-figure", "fvn-spacing", "fvn-fraction"],
      "fvn-ordinal": ["fvn-normal"],
      "fvn-slashed-zero": ["fvn-normal"],
      "fvn-figure": ["fvn-normal"],
      "fvn-spacing": ["fvn-normal"],
      "fvn-fraction": ["fvn-normal"],
      "line-clamp": ["display", "overflow"],
      rounded: ["rounded-s", "rounded-e", "rounded-t", "rounded-r", "rounded-b", "rounded-l", "rounded-ss", "rounded-se", "rounded-ee", "rounded-es", "rounded-tl", "rounded-tr", "rounded-br", "rounded-bl"],
      "rounded-s": ["rounded-ss", "rounded-es"],
      "rounded-e": ["rounded-se", "rounded-ee"],
      "rounded-t": ["rounded-tl", "rounded-tr"],
      "rounded-r": ["rounded-tr", "rounded-br"],
      "rounded-b": ["rounded-br", "rounded-bl"],
      "rounded-l": ["rounded-tl", "rounded-bl"],
      "border-spacing": ["border-spacing-x", "border-spacing-y"],
      "border-w": ["border-w-x", "border-w-y", "border-w-s", "border-w-e", "border-w-t", "border-w-r", "border-w-b", "border-w-l"],
      "border-w-x": ["border-w-r", "border-w-l"],
      "border-w-y": ["border-w-t", "border-w-b"],
      "border-color": ["border-color-x", "border-color-y", "border-color-s", "border-color-e", "border-color-t", "border-color-r", "border-color-b", "border-color-l"],
      "border-color-x": ["border-color-r", "border-color-l"],
      "border-color-y": ["border-color-t", "border-color-b"],
      translate: ["translate-x", "translate-y", "translate-none"],
      "translate-none": ["translate", "translate-x", "translate-y", "translate-z"],
      "scroll-m": ["scroll-mx", "scroll-my", "scroll-ms", "scroll-me", "scroll-mt", "scroll-mr", "scroll-mb", "scroll-ml"],
      "scroll-mx": ["scroll-mr", "scroll-ml"],
      "scroll-my": ["scroll-mt", "scroll-mb"],
      "scroll-p": ["scroll-px", "scroll-py", "scroll-ps", "scroll-pe", "scroll-pt", "scroll-pr", "scroll-pb", "scroll-pl"],
      "scroll-px": ["scroll-pr", "scroll-pl"],
      "scroll-py": ["scroll-pt", "scroll-pb"],
      touch: ["touch-x", "touch-y", "touch-pz"],
      "touch-x": ["touch"],
      "touch-y": ["touch"],
      "touch-pz": ["touch"]
    },
    conflictingClassGroupModifiers: {
      "font-size": ["leading"]
    },
    orderSensitiveModifiers: ["*", "**", "after", "backdrop", "before", "details-content", "file", "first-letter", "first-line", "marker", "placeholder", "selection"]
  };
}, ts = /* @__PURE__ */ Ia(es);
function ee(...t) {
  return ts(So(t));
}
function qe({ className: t, ...e }) {
  return /* @__PURE__ */ d(
    "div",
    {
      "data-slot": "card",
      className: ee(
        "bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm",
        t
      ),
      ...e
    }
  );
}
function Le({ className: t, ...e }) {
  return /* @__PURE__ */ d(
    "div",
    {
      "data-slot": "card-content",
      className: ee("px-6", t),
      ...e
    }
  );
}
function At({
  clicked: t,
  onClick: e,
  animationDelay: r,
  icon: n,
  title: o,
  subtitle: i,
  description: a,
  gradientFrom: s,
  gradientTo: l,
  subtitleColor: u
}) {
  return /* @__PURE__ */ d(
    qe,
    {
      className: `
        relative overflow-hidden cursor-pointer select-none
        transition-all duration-300 ease-out
        hover:scale-105 active:scale-95
        ${t ? "scale-95 shadow-inner" : "shadow-xl hover:shadow-2xl"}
        animate-fade-in-up
      `,
      style: { animationDelay: r },
      onClick: e,
      children: [
        t && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-white opacity-30 animate-ping rounded-lg" }),
        /* @__PURE__ */ d(
          "div",
          {
            className: `absolute inset-0 bg-gradient-to-br ${s} ${l} opacity-5`
          }
        ),
        /* @__PURE__ */ d(Le, { className: "p-8 text-center space-y-6 relative z-10", children: [
          /* @__PURE__ */ d(
            "div",
            {
              className: `mx-auto w-20 h-20 bg-gradient-to-br ${s} ${l} rounded-full flex items-center justify-center text-white`,
              children: n
            }
          ),
          /* @__PURE__ */ d("div", { children: [
            /* @__PURE__ */ d("h1", { className: "text-3xl font-bold text-gray-800 mb-2", children: o }),
            /* @__PURE__ */ d("h2", { className: `text-2xl font-semibold ${u}`, children: i })
          ] }),
          /* @__PURE__ */ d("p", { className: "text-gray-600 text-sm leading-relaxed", children: a }),
          /* @__PURE__ */ d("div", { className: "text-xs text-gray-500 animate-bounce-subtle", children: "👆 Sentuh untuk pilih" })
        ] })
      ]
    }
  );
}
function rs() {
  const t = j(B);
  return /* @__PURE__ */ d("div", { className: "space-y-6 animate-fade-in", children: [
    /* @__PURE__ */ d("div", { className: "mx-auto w-32 h-32 bg-gradient-to-br from-sky-100 to-sky-400 rounded-full flex items-center justify-center animate-pulse-slow", children: /* @__PURE__ */ d(
      "img",
      {
        src: `${t == null ? void 0 : t.baseUrl.value}/resources/web_component/antrian_loket/logo-rsud.png`,
        className: "w-28 h-28"
      }
    ) }),
    /* @__PURE__ */ d("div", { children: [
      /* @__PURE__ */ d("h1", { className: "text-5xl md:text-6xl font-bold text-gray-800 mb-4", children: "SELAMAT DATANG" }),
      /* @__PURE__ */ d("p", { className: "text-lg text-gray-500", children: "Silakan pilih opsi di bawah ini" })
    ] })
  ] });
}
function ns() {
  return /* @__PURE__ */ d(
    "div",
    {
      className: "text-center text-gray-600 animate-fade-in",
      style: { animationDelay: "600ms" },
      children: [
        /* @__PURE__ */ d("div", { className: "text-base mb-2", children: "⏰ Jam Pelayanan: 08:00 - 16:00 WIB" }),
        /* @__PURE__ */ d("div", { className: "text-sm", children: "Untuk bantuan, hubungi petugas di meja informasi" })
      ]
    }
  );
}
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const cn = (t) => t.replace(/([a-z0-9])([A-Z])/g, "$1-$2").toLowerCase(), os = (t) => t.replace(
  /^([A-Z])|[\s-_]+(\w)/g,
  (e, r, n) => n ? n.toUpperCase() : r.toLowerCase()
), un = (t) => {
  const e = os(t);
  return e.charAt(0).toUpperCase() + e.slice(1);
}, is = (...t) => t.filter((e, r, n) => !!e && e.trim() !== "" && n.indexOf(e) === r).join(" ").trim();
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
var as = {
  xmlns: "http://www.w3.org/2000/svg",
  width: 24,
  height: 24,
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  "stroke-width": "2",
  "stroke-linecap": "round",
  "stroke-linejoin": "round"
};
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ss = ({
  color: t = "currentColor",
  size: e = 24,
  strokeWidth: r = 2,
  absoluteStrokeWidth: n,
  children: o,
  iconNode: i,
  class: a = "",
  ...s
}) => Q(
  "svg",
  {
    ...as,
    width: String(e),
    height: e,
    stroke: t,
    "stroke-width": n ? Number(r) * 24 / Number(e) : r,
    class: ["lucide", a].join(" "),
    ...s
  },
  [...i.map(([l, u]) => Q(l, u)), ...X(o)]
);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const A = (t, e) => {
  const r = ({ class: n = "", children: o, ...i }) => Q(
    ss,
    {
      ...i,
      iconNode: e,
      class: is(
        `lucide-${cn(un(t))}`,
        `lucide-${cn(t)}`,
        n
      )
    },
    o
  );
  return r.displayName = un(t), r;
};
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ls = A("activity", [
  [
    "path",
    {
      d: "M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2",
      key: "169zse"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const cs = A("align-left", [
  ["path", { d: "M15 12H3", key: "6jk70r" }],
  ["path", { d: "M17 18H3", key: "1amg6g" }],
  ["path", { d: "M21 6H3", key: "1jwq7v" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const us = A("apple", [
  [
    "path",
    {
      d: "M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z",
      key: "3s7exb"
    }
  ],
  ["path", { d: "M10 2c1 .5 2 2 2 5", key: "fcco2y" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const br = A("arrow-left", [
  ["path", { d: "m12 19-7-7 7-7", key: "1l729n" }],
  ["path", { d: "M19 12H5", key: "x3x0zl" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const dn = A("baby", [
  ["path", { d: "M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5", key: "1u7htd" }],
  ["path", { d: "M15 12h.01", key: "1k8ypt" }],
  [
    "path",
    {
      d: "M19.38 6.813A9 9 0 0 1 20.8 10.2a2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1",
      key: "11xh7x"
    }
  ],
  ["path", { d: "M9 12h.01", key: "157uk2" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ds = A("bone", [
  [
    "path",
    {
      d: "M17 10c.7-.7 1.69 0 2.5 0a2.5 2.5 0 1 0 0-5 .5.5 0 0 1-.5-.5 2.5 2.5 0 1 0-5 0c0 .81.7 1.8 0 2.5l-7 7c-.7.7-1.69 0-2.5 0a2.5 2.5 0 0 0 0 5c.28 0 .5.22.5.5a2.5 2.5 0 1 0 5 0c0-.81-.7-1.8 0-2.5Z",
      key: "w610uw"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const hs = A("brain", [
  [
    "path",
    {
      d: "M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z",
      key: "l5xja"
    }
  ],
  [
    "path",
    {
      d: "M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z",
      key: "ep3f8r"
    }
  ],
  ["path", { d: "M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4", key: "1p4c4q" }],
  ["path", { d: "M17.599 6.5a3 3 0 0 0 .399-1.375", key: "tmeiqw" }],
  ["path", { d: "M6.003 5.125A3 3 0 0 0 6.401 6.5", key: "105sqy" }],
  ["path", { d: "M3.477 10.896a4 4 0 0 1 .585-.396", key: "ql3yin" }],
  ["path", { d: "M19.938 10.5a4 4 0 0 1 .585.396", key: "1qfode" }],
  ["path", { d: "M6 18a4 4 0 0 1-1.967-.516", key: "2e4loj" }],
  ["path", { d: "M19.967 17.484A4 4 0 0 1 18 18", key: "159ez6" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const fs = A("briefcase", [
  ["path", { d: "M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16", key: "jecpp" }],
  ["rect", { width: "20", height: "14", x: "2", y: "6", rx: "2", key: "i6l2r4" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ps = A("calendar", [
  ["path", { d: "M8 2v4", key: "1cmpym" }],
  ["path", { d: "M16 2v4", key: "4m81vk" }],
  ["rect", { width: "18", height: "18", x: "3", y: "4", rx: "2", key: "1hopcy" }],
  ["path", { d: "M3 10h18", key: "8toen8" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const gs = A("camera", [
  [
    "path",
    {
      d: "M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z",
      key: "1tc9qg"
    }
  ],
  ["circle", { cx: "12", cy: "13", r: "3", key: "1vg3eu" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const vs = A("droplets", [
  [
    "path",
    {
      d: "M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z",
      key: "1ptgy4"
    }
  ],
  [
    "path",
    {
      d: "M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97",
      key: "1sl1rz"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ms = A("dumbbell", [
  [
    "path",
    {
      d: "M17.596 12.768a2 2 0 1 0 2.829-2.829l-1.768-1.767a2 2 0 0 0 2.828-2.829l-2.828-2.828a2 2 0 0 0-2.829 2.828l-1.767-1.768a2 2 0 1 0-2.829 2.829z",
      key: "9m4mmf"
    }
  ],
  ["path", { d: "m2.5 21.5 1.4-1.4", key: "17g3f0" }],
  ["path", { d: "m20.1 3.9 1.4-1.4", key: "1qn309" }],
  [
    "path",
    {
      d: "M5.343 21.485a2 2 0 1 0 2.829-2.828l1.767 1.768a2 2 0 1 0 2.829-2.829l-6.364-6.364a2 2 0 1 0-2.829 2.829l1.768 1.767a2 2 0 0 0-2.828 2.829z",
      key: "1t2c92"
    }
  ],
  ["path", { d: "m9.6 14.4 4.8-4.8", key: "6umqxw" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ys = A("ear", [
  ["path", { d: "M6 8.5a6.5 6.5 0 1 1 13 0c0 6-6 6-6 10a3.5 3.5 0 1 1-7 0", key: "1dfaln" }],
  ["path", { d: "M15 8.5a2.5 2.5 0 0 0-5 0v1a2 2 0 1 1 0 4", key: "1qnva7" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ws = A("eye", [
  [
    "path",
    {
      d: "M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0",
      key: "1nclc0"
    }
  ],
  ["circle", { cx: "12", cy: "12", r: "3", key: "1v7zrd" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const bs = A("flower", [
  ["circle", { cx: "12", cy: "12", r: "3", key: "1v7zrd" }],
  [
    "path",
    {
      d: "M12 16.5A4.5 4.5 0 1 1 7.5 12 4.5 4.5 0 1 1 12 7.5a4.5 4.5 0 1 1 4.5 4.5 4.5 4.5 0 1 1-4.5 4.5",
      key: "14wa3c"
    }
  ],
  ["path", { d: "M12 7.5V9", key: "1oy5b0" }],
  ["path", { d: "M7.5 12H9", key: "eltsq1" }],
  ["path", { d: "M16.5 12H15", key: "vk5kw4" }],
  ["path", { d: "M12 16.5V15", key: "k7eayi" }],
  ["path", { d: "m8 8 1.88 1.88", key: "nxy4qf" }],
  ["path", { d: "M14.12 9.88 16 8", key: "1lst6k" }],
  ["path", { d: "m8 16 1.88-1.88", key: "h2eex1" }],
  ["path", { d: "M14.12 14.12 16 16", key: "uqkrx3" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const _s = A("heart", [
  [
    "path",
    {
      d: "M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z",
      key: "c3ymky"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const xs = A("info", [
  ["circle", { cx: "12", cy: "12", r: "10", key: "1mglay" }],
  ["path", { d: "M12 16v-4", key: "1dtifu" }],
  ["path", { d: "M12 8h.01", key: "e9boi3" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const ks = A("network", [
  ["rect", { x: "16", y: "16", width: "6", height: "6", rx: "1", key: "4q2zg0" }],
  ["rect", { x: "2", y: "16", width: "6", height: "6", rx: "1", key: "8cvhb9" }],
  ["rect", { x: "9", y: "2", width: "6", height: "6", rx: "1", key: "1egb70" }],
  ["path", { d: "M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3", key: "1jsf9p" }],
  ["path", { d: "M12 12V8", key: "2874zd" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Cs = A("qr-code", [
  ["rect", { width: "5", height: "5", x: "3", y: "3", rx: "1", key: "1tu5fj" }],
  ["rect", { width: "5", height: "5", x: "16", y: "3", rx: "1", key: "1v8r4q" }],
  ["rect", { width: "5", height: "5", x: "3", y: "16", rx: "1", key: "1x03jg" }],
  ["path", { d: "M21 16h-3a2 2 0 0 0-2 2v3", key: "177gqh" }],
  ["path", { d: "M21 21v.01", key: "ents32" }],
  ["path", { d: "M12 7v3a2 2 0 0 1-2 2H7", key: "8crl2c" }],
  ["path", { d: "M3 12h.01", key: "nlz23k" }],
  ["path", { d: "M12 3h.01", key: "n36tog" }],
  ["path", { d: "M12 16v.01", key: "133mhm" }],
  ["path", { d: "M16 12h1", key: "1slzba" }],
  ["path", { d: "M21 12v.01", key: "1lwtk9" }],
  ["path", { d: "M12 21v-1", key: "1880an" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Ss = A("scissors", [
  ["circle", { cx: "6", cy: "6", r: "3", key: "1lh9wr" }],
  ["path", { d: "M8.12 8.12 12 12", key: "1alkpv" }],
  ["path", { d: "M20 4 8.12 15.88", key: "xgtan2" }],
  ["circle", { cx: "6", cy: "18", r: "3", key: "fqmcym" }],
  ["path", { d: "M14.8 14.8 20 20", key: "ptml3r" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Ms = A("shield", [
  [
    "path",
    {
      d: "M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z",
      key: "oel41y"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const hn = A("smile", [
  ["circle", { cx: "12", cy: "12", r: "10", key: "1mglay" }],
  ["path", { d: "M8 14s1.5 2 4 2 4-2 4-2", key: "1y1vjs" }],
  ["line", { x1: "9", x2: "9.01", y1: "9", y2: "9", key: "yxxnd0" }],
  ["line", { x1: "15", x2: "15.01", y1: "9", y2: "9", key: "1p4y9e" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const pt = A("stethoscope", [
  ["path", { d: "M11 2v2", key: "1539x4" }],
  ["path", { d: "M5 2v2", key: "1yf1q8" }],
  ["path", { d: "M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1", key: "rb5t3r" }],
  ["path", { d: "M8 15a6 6 0 0 0 12 0v-3", key: "x18d4x" }],
  ["circle", { cx: "20", cy: "10", r: "2", key: "ts1r5v" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Rs = A("tree-pine", [
  [
    "path",
    {
      d: "m17 14 3 3.3a1 1 0 0 1-.7 1.7H4.7a1 1 0 0 1-.7-1.7L7 14h-.3a1 1 0 0 1-.7-1.7L9 9h-.2A1 1 0 0 1 8 7.3L12 3l4 4.3a1 1 0 0 1-.8 1.7H15l3 3.3a1 1 0 0 1-.7 1.7H17Z",
      key: "cpyugq"
    }
  ],
  ["path", { d: "M12 22v-3", key: "kmzjlo" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Ps = A("trees", [
  ["path", { d: "M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z", key: "1l6gj6" }],
  ["path", { d: "M7 16v6", key: "1a82de" }],
  ["path", { d: "M13 19v3", key: "13sx9i" }],
  [
    "path",
    {
      d: "M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5",
      key: "1sj9kv"
    }
  ]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Ns = A("user", [
  ["path", { d: "M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2", key: "975kel" }],
  ["circle", { cx: "12", cy: "7", r: "4", key: "17ys0d" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Os = A("users", [
  ["path", { d: "M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2", key: "1yyitq" }],
  ["path", { d: "M16 3.128a4 4 0 0 1 0 7.744", key: "16gr8j" }],
  ["path", { d: "M22 21v-2a4 4 0 0 0-3-3.87", key: "kshegd" }],
  ["circle", { cx: "9", cy: "7", r: "4", key: "nufk8" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const Es = A("wallet", [
  [
    "path",
    {
      d: "M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1",
      key: "18etb6"
    }
  ],
  ["path", { d: "M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4", key: "xoc0q4" }]
]);
/**
* @license lucide-preact v0.516.0 - ISC
*
* This source code is licensed under the ISC license.
* See the LICENSE file in the root directory of this source tree.
*/
const As = A("zap", [
  [
    "path",
    {
      d: "M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z",
      key: "1xq2db"
    }
  ]
]);
function fn() {
  const t = j(B), [e, r] = H(null);
  if (!t) return /* @__PURE__ */ d("div", { children: "Context not found" });
  const { mutate: n } = _a(), o = (i) => {
    r(i), setTimeout(() => {
      r(null);
    }, 200), i === "new" ? t.currentView.value = "noCode" : i === "existing" ? n("Antrian APM") : i === "informasi" && n("Informasi");
  };
  return /* @__PURE__ */ d("div", { className: "min-h-screen w-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center p-4", children: /* @__PURE__ */ d("div", { className: "max-w-7xl mx-auto text-center space-y-12", children: [
    /* @__PURE__ */ d(rs, {}),
    /* @__PURE__ */ d("div", { className: "grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in-up", children: [
      /* @__PURE__ */ d(
        At,
        {
          clicked: e === "existing",
          onClick: () => o("existing"),
          animationDelay: "200ms",
          icon: /* @__PURE__ */ d(Cs, { className: "h-10 w-10" }),
          title: "Sudah Memiliki",
          subtitle: "Kode Booking",
          description: "Jika Anda sudah memiliki kode booking dari pendaftaran online atau aplikasi mobile",
          gradientFrom: "from-green-400",
          gradientTo: "to-green-600",
          subtitleColor: "text-green-600"
        }
      ),
      /* @__PURE__ */ d(
        At,
        {
          clicked: e === "new",
          onClick: () => o("new"),
          animationDelay: "400ms",
          icon: /* @__PURE__ */ d(ps, { className: "h-10 w-10" }),
          title: "Belum Memiliki",
          subtitle: "Kode Booking",
          description: "Daftar baru untuk mendapatkan nomor antrian dan memilih dokter yang tersedia",
          gradientFrom: "from-blue-400",
          gradientTo: "to-blue-600",
          subtitleColor: "text-blue-600"
        }
      ),
      /* @__PURE__ */ d(
        At,
        {
          clicked: e === "informasi",
          onClick: () => o("informasi"),
          animationDelay: "400ms",
          icon: /* @__PURE__ */ d(pt, { className: "h-10 w-10" }),
          title: "Informasi",
          subtitle: "Rumah Sakit",
          description: "Layanan informasi, jam operasional, dan fasilitas rumah sakit",
          gradientFrom: "from-purple-400",
          gradientTo: "to-purple-600",
          subtitleColor: "text-purple-600"
        }
      )
    ] }),
    /* @__PURE__ */ d(ns, {})
  ] }) });
}
function pn(t, e) {
  if (typeof t == "function")
    return t(e);
  t != null && (t.current = e);
}
function $s(...t) {
  return (e) => {
    let r = !1;
    const n = t.map((o) => {
      const i = pn(o, e);
      return !r && typeof i == "function" && (r = !0), i;
    });
    if (r)
      return () => {
        for (let o = 0; o < n.length; o++) {
          const i = n[o];
          typeof i == "function" ? i() : pn(t[o], null);
        }
      };
  };
}
// @__NO_SIDE_EFFECTS__
function zs(t) {
  const e = /* @__PURE__ */ Is(t), r = vt((n, o) => {
    const { children: i, ...a } = n, s = ge.toArray(i), l = s.find(js);
    if (l) {
      const u = l.props.children, h = s.map((c) => c === l ? ge.count(u) > 1 ? ge.only(null) : ie(u) ? u.props.children : null : c);
      return /* @__PURE__ */ d(e, { ...a, ref: o, children: ie(u) ? mt(u, void 0, h) : null });
    }
    return /* @__PURE__ */ d(e, { ...a, ref: o, children: i });
  });
  return r.displayName = `${t}.Slot`, r;
}
var Fo = /* @__PURE__ */ zs("Slot");
// @__NO_SIDE_EFFECTS__
function Is(t) {
  const e = vt((r, n) => {
    const { children: o, ...i } = r;
    if (ie(o)) {
      const a = Ts(o), s = Ds(i, o.props);
      return o.type !== K && (s.ref = n ? $s(n, a) : a), mt(o, s);
    }
    return ge.count(o) > 1 ? ge.only(null) : null;
  });
  return e.displayName = `${t}.SlotClone`, e;
}
var Fs = Symbol("radix.slottable");
function js(t) {
  return ie(t) && typeof t.type == "function" && "__radixId" in t.type && t.type.__radixId === Fs;
}
function Ds(t, e) {
  const r = { ...e };
  for (const n in e) {
    const o = t[n], i = e[n];
    /^on[A-Z]/.test(n) ? o && i ? r[n] = (...s) => {
      const l = i(...s);
      return o(...s), l;
    } : o && (r[n] = o) : n === "style" ? r[n] = { ...o, ...i } : n === "className" && (r[n] = [o, i].filter(Boolean).join(" "));
  }
  return { ...t, ...r };
}
function Ts(t) {
  var n, o;
  let e = (n = Object.getOwnPropertyDescriptor(t.props, "ref")) == null ? void 0 : n.get, r = e && "isReactWarning" in e && e.isReactWarning;
  return r ? t.ref : (e = (o = Object.getOwnPropertyDescriptor(t, "ref")) == null ? void 0 : o.get, r = e && "isReactWarning" in e && e.isReactWarning, r ? t.props.ref : t.props.ref || t.ref);
}
const gn = (t) => typeof t == "boolean" ? `${t}` : t === 0 ? "0" : t, vn = So, jo = (t, e) => (r) => {
  var n;
  if ((e == null ? void 0 : e.variants) == null) return vn(t, r == null ? void 0 : r.class, r == null ? void 0 : r.className);
  const { variants: o, defaultVariants: i } = e, a = Object.keys(o).map((u) => {
    const h = r == null ? void 0 : r[u], c = i == null ? void 0 : i[u];
    if (h === null) return null;
    const p = gn(h) || gn(c);
    return o[u][p];
  }), s = r && Object.entries(r).reduce((u, h) => {
    let [c, p] = h;
    return p === void 0 || (u[c] = p), u;
  }, {}), l = e == null || (n = e.compoundVariants) === null || n === void 0 ? void 0 : n.reduce((u, h) => {
    let { class: c, className: p, ...f } = h;
    return Object.entries(f).every((g) => {
      let [y, m] = g;
      return Array.isArray(m) ? m.includes({
        ...i,
        ...s
      }[y]) : {
        ...i,
        ...s
      }[y] === m;
    }) ? [
      ...u,
      c,
      p
    ] : u;
  }, []);
  return vn(t, a, l, r == null ? void 0 : r.class, r == null ? void 0 : r.className);
}, Us = jo(
  "inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive",
  {
    variants: {
      variant: {
        default: "bg-primary text-primary-foreground shadow-xs hover:bg-primary/90",
        destructive: "bg-destructive text-white shadow-xs hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/60",
        outline: "border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50",
        secondary: "bg-secondary text-secondary-foreground shadow-xs hover:bg-secondary/80",
        ghost: "hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50",
        link: "text-primary underline-offset-4 hover:underline"
      },
      size: {
        default: "h-9 px-4 py-2 has-[>svg]:px-3",
        sm: "h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5",
        lg: "h-10 rounded-md px-6 has-[>svg]:px-4",
        icon: "size-9"
      }
    },
    defaultVariants: {
      variant: "default",
      size: "default"
    }
  }
);
function bt({
  className: t,
  variant: e,
  size: r,
  asChild: n = !1,
  ...o
}) {
  return (
    // @ts-ignore
    /* @__PURE__ */ d(
      n ? Fo : "button",
      {
        "data-slot": "button",
        className: ee(Us({ variant: e, size: r, className: t })),
        ...o
      }
    )
  );
}
function qs() {
  const t = j(B);
  return t ? /* @__PURE__ */ d(bt, { onClick: () => t.currentView.value = "initial", children: "Kembali Ke Awal" }) : /* @__PURE__ */ d("div", { children: "Context not found" });
}
function Ls() {
  const t = j(B);
  if (!t)
    throw new Error("AppState context not found");
  return gr({
    mutationFn: async (e) => {
      console.log("Step 1: Mendapatkan kode booking");
      const r = await vr(
        t.baseUrl.value,
        t.usia.value
      );
      console.log("Step 2: Tambah antrian");
      const n = await mr(t.baseUrl.value, {
        ...r.metaData.response,
        ...e,
        is_antrian_loket: !0
      });
      return await yr(
        t.baseUrl.value,
        n.id_antrian,
        n.kode_booking
      ), console.log("Step 3: Lakukan checkin"), n;
    },
    onSuccess: (e) => {
      const r = window.innerWidth, n = window.innerHeight, o = window.screen.width / 2 - r / 2, i = window.screen.height / 2 - n / 2;
      window.open(
        `${t.baseUrl.value}/booking_poliklinik/cetak_antrian_loket_booking/${e.id_antrian}`,
        "_blank",
        "width=" + r + ", height=" + n + ", left=" + o + ", top=" + i
      ), window.opener ? window.opener.postMessage("taskCompleteAndClose", "*") : console.log(
        "Cannot find window.opener. This window cannot close itself."
      );
    },
    onSettled: () => {
      t.usia.value = "Asuransi", t.currentView.value = "initial", t.poliklinik.value = null;
    }
  });
}
const Qs = jo(
  "inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden",
  {
    variants: {
      variant: {
        default: "border-transparent bg-primary text-primary-foreground [a&]:hover:bg-primary/90",
        secondary: "border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90",
        destructive: "border-transparent bg-destructive text-white [a&]:hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/60",
        outline: "text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground"
      }
    },
    defaultVariants: {
      variant: "default"
    }
  }
);
function Do({
  className: t,
  variant: e,
  asChild: r = !1,
  ...n
}) {
  return /* @__PURE__ */ d(
    r ? Fo : "span",
    {
      "data-slot": "badge",
      className: ee(Qs({ variant: e }), t),
      ...n
    }
  );
}
const mn = {
  Anak: {
    icon: dn,
    color: "bg-pink-500",
    gradient: "from-pink-400 to-pink-600"
  },
  Bedah: {
    icon: Ss,
    color: "bg-red-500",
    gradient: "from-red-400 to-red-600"
  },
  "Bedah Mulut": {
    icon: hn,
    color: "bg-blue-500",
    gradient: "from-blue-400 to-blue-600"
  },
  Cemara: {
    icon: Rs,
    color: "bg-green-500",
    gradient: "from-green-400 to-green-600"
  },
  Gizi: {
    icon: us,
    color: "bg-orange-500",
    gradient: "from-orange-400 to-orange-600"
  },
  Jantung: {
    icon: _s,
    color: "bg-red-500",
    gradient: "from-red-400 to-red-600"
  },
  Jiwa: {
    icon: hs,
    color: "bg-purple-500",
    gradient: "from-purple-400 to-purple-600"
  },
  "Kedokteran Gigi Anak": {
    icon: dn,
    color: "bg-cyan-500",
    gradient: "from-cyan-400 to-cyan-600"
  },
  "Klinik Akasia": {
    icon: bs,
    color: "bg-yellow-500",
    gradient: "from-yellow-400 to-yellow-600"
  },
  "Klinik KB": {
    icon: Os,
    color: "bg-teal-500",
    gradient: "from-teal-400 to-teal-600"
  },
  "Konservasi Gigi": {
    icon: Ms,
    color: "bg-emerald-500",
    gradient: "from-emerald-400 to-emerald-600"
  },
  "Kulit Kelamin": {
    icon: As,
    color: "bg-amber-500",
    gradient: "from-amber-400 to-amber-600"
  },
  Mata: {
    icon: ws,
    color: "bg-blue-500",
    gradient: "from-blue-400 to-blue-600"
  },
  "Medical Check Up": {
    icon: pt,
    color: "bg-green-500",
    gradient: "from-green-400 to-green-600"
  },
  Obgyn: {
    icon: Ns,
    color: "bg-pink-500",
    gradient: "from-pink-400 to-pink-600"
  },
  Okupasi: {
    icon: fs,
    color: "bg-indigo-500",
    gradient: "from-indigo-400 to-indigo-600"
  },
  Orthodonti: {
    icon: cs,
    color: "bg-violet-500",
    gradient: "from-violet-400 to-violet-600"
  },
  Orthopaedi: {
    icon: ds,
    color: "bg-orange-500",
    gradient: "from-orange-400 to-orange-600"
  },
  Paru: {
    icon: Ps,
    color: "bg-sky-500",
    gradient: "from-sky-400 to-sky-600"
  },
  "Penyakit Dalam": {
    icon: ls,
    color: "bg-red-500",
    gradient: "from-red-400 to-red-600"
  },
  "Penyakit Mulut": {
    icon: hn,
    color: "bg-rose-500",
    gradient: "from-rose-400 to-rose-600"
  },
  "Radiologi Gigi": {
    icon: gs,
    color: "bg-gray-500",
    gradient: "from-gray-400 to-gray-600"
  },
  "Rehab Medik": {
    icon: ms,
    color: "bg-lime-500",
    gradient: "from-lime-400 to-lime-600"
  },
  Syaraf: {
    icon: ks,
    color: "bg-purple-500",
    gradient: "from-purple-400 to-purple-600"
  },
  THT: {
    icon: ys,
    color: "bg-indigo-500",
    gradient: "from-indigo-400 to-indigo-600"
  },
  Urologi: {
    icon: vs,
    color: "bg-blue-500",
    gradient: "from-blue-400 to-blue-600"
  },
  // Default fallback
  default: {
    icon: pt,
    color: "bg-gray-500",
    gradient: "from-gray-400 to-gray-600"
  }
};
function To(t) {
  return mn[t] || mn.default;
}
function Uo(t, e) {
  const r = t / e * 100;
  return t === 0 ? {
    status: "PENUH",
    color: "bg-red-100 text-red-800",
    available: !1
  } : r <= 30 ? {
    status: "TERBATAS",
    color: "bg-yellow-100 text-yellow-800",
    available: !0
  } : {
    status: "TERSEDIA",
    color: "bg-green-100 text-green-800",
    available: !0
  };
}
function Hs({ poli: t, index: e }) {
  const r = j(B);
  if (!r) return /* @__PURE__ */ d("div", { children: "Context not found" });
  const [n, o] = H(!1), [i, a] = H(!1), [s] = H(
    t.is_more_then_one_doctor ? null : t.doctors[0]
  ), { mutate: l, isPending: u } = Ls(), h = (g) => {
    g && (s && l({
      id_dokter: s.id_dokter,
      id_poli: t.id_spesialisasi,
      id_jadwal_dokter: s.id_jadwal_dokter,
      kode_bpjs_poli: s.kode_bpjs_poli,
      nama_dokter: s.nama_dokter,
      kode_bpjs_dokter: s.kode_bpjs_dokter
    }), o(!0), a(!0), setTimeout(() => o(!1), 200), setTimeout(() => a(!1), 3e3), t.is_more_then_one_doctor && (r.currentView.value = "listDokter", r.poliklinik.value = t));
  }, c = To(t.spesialisasi), p = c.icon, f = Uo(
    t.doctors.reduce((g, y) => g + y.sisa_kuota, 0),
    t.doctors.reduce((g, y) => g + y.kuota, 0)
  );
  return /* @__PURE__ */ d(
    qe,
    {
      className: ee(
        "relative overflow-hidden cursor-pointer select-none transition-all duration-300 ease-out animate-fade-in-up",
        f.available && !u ? "hover:scale-105 active:scale-95" : "opacity-60 cursor-not-allowed",
        n ? "scale-95 shadow-inner" : "shadow-lg hover:shadow-xl",
        i && "ring-4 ring-blue-400/50",
        u && "ring-4 ring-orange-400/50 animate-pulse"
      ),
      style: { animationDelay: `${e * 50}ms` },
      onClick: () => h(f.available),
      children: [
        n && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-white opacity-30 animate-ping rounded-lg" }),
        u && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-orange-500/30 flex items-center justify-center z-20", children: /* @__PURE__ */ d("div", { className: "flex flex-col items-center space-y-2", children: [
          /* @__PURE__ */ d("div", { className: "w-8 h-8 border-4 border-orange-500 border-t-transparent rounded-full animate-spin" }),
          /* @__PURE__ */ d("div", { className: "text-xs font-semibold text-orange-700", children: "Memproses..." })
        ] }) }),
        /* @__PURE__ */ d(
          "div",
          {
            className: `absolute inset-0 bg-gradient-to-br ${c.gradient} opacity-5`
          }
        ),
        /* @__PURE__ */ d(Le, { className: "p-6 text-center space-y-4 relative z-10", children: [
          /* @__PURE__ */ d(
            "div",
            {
              className: ee(
                `mx-auto w-16 h-16 rounded-full flex items-center justify-center bg-gradient-to-br ${c.gradient} text-white transition-transform duration-300`,
                n && "scale-110",
                u ? "animate-spin" : f.available && "animate-pulse-slow"
              ),
              children: /* @__PURE__ */ d(p, { className: "h-8 w-8" })
            }
          ),
          /* @__PURE__ */ d("h3", { className: "text-xl font-bold text-gray-800 leading-tight", children: t.spesialisasi }),
          /* @__PURE__ */ d("div", { className: "space-y-2", children: [
            /* @__PURE__ */ d("div", { className: "text-3xl font-bold text-gray-800", children: t.doctors.reduce((g, y) => g + y.sisa_kuota, 0) }),
            /* @__PURE__ */ d("div", { className: "text-sm text-gray-600", children: [
              "dari ",
              t.doctors.reduce((g, y) => g + y.kuota, 0),
              " kuota"
            ] })
          ] }),
          f.status === "PENUH" && /* @__PURE__ */ d(
            Do,
            {
              className: `${f.color} font-semibold px-4 py-1 text-sm`,
              children: f.status
            }
          ),
          f.available && !u && /* @__PURE__ */ d("div", { className: "text-xs text-gray-500 mt-2 animate-bounce-subtle", children: "👆 Sentuh untuk pilih" })
        ] }),
        !f.available && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-gray-500 bg-opacity-20 flex items-center justify-center", children: /* @__PURE__ */ d("div", { className: "text-4xl", children: "🚫" }) })
      ]
    },
    t.id_spesialisasi
  );
}
function Bs() {
  const t = j(B);
  if (!t) return /* @__PURE__ */ d("div", { children: "Context not found" });
  const { data: e, isLoading: r } = ya({
    queryKey: ["poliklinik"],
    queryFn: () => ba(t.baseUrl.value)
  });
  return r ? /* @__PURE__ */ d("div", { className: "w-full min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center", children: /* @__PURE__ */ d("div", { className: "text-center space-y-8 max-w-md mx-auto p-8", children: [
    /* @__PURE__ */ d("div", { className: "mx-auto w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center animate-pulse-slow", children: /* @__PURE__ */ d(pt, { className: "h-12 w-12 text-white" }) }),
    /* @__PURE__ */ d("div", { className: "space-y-4", children: [
      /* @__PURE__ */ d("h1", { className: "text-3xl font-bold text-gray-800", children: "Memuat Data Poliklinik" }),
      /* @__PURE__ */ d("p", { className: "text-gray-600", children: "Mohon tunggu sebentar..." })
    ] }),
    /* @__PURE__ */ d("div", { className: "flex justify-center", children: /* @__PURE__ */ d("div", { className: "w-8 h-8 border-4 border-blue-500 border-t-transparent rounded-full animate-spin" }) })
  ] }) }) : /* @__PURE__ */ d(
    "div",
    {
      className: ee(
        "text-center w-full",
        e && e.length <= 8 && "lg:w-9/12"
      ),
      children: [
        /* @__PURE__ */ d("div", { className: "text-center mb-8 animate-fade-in", children: [
          /* @__PURE__ */ d("div", { className: "flex items-center justify-center space-x-4 mb-4", children: [
            /* @__PURE__ */ d(
              bt,
              {
                onClick: () => t.currentView.value = "initial",
                variant: "outline",
                size: "lg",
                className: "mr-4 bg-white text-gray-700 hover:bg-gray-50 text-3xl",
                children: [
                  /* @__PURE__ */ d(br, { className: "h-24 w-24 mr-2" }),
                  /* @__PURE__ */ d("b", { children: "KEMBALI" })
                ]
              }
            ),
            /* @__PURE__ */ d("h1", { className: "text-5xl font-bold text-gray-800 mb-2", children: "PILIH POLIKLINIK" })
          ] }),
          /* @__PURE__ */ d("p", { className: "text-xl text-gray-600", children: "Sentuh untuk memilih layanan kesehatan" })
        ] }),
        /* @__PURE__ */ d(
          "div",
          {
            className: ee(
              "grid gap-6",
              e && e.length < 4 && " lg:grid-cols-1",
              e && e.length >= 4 && e.length <= 8 && " lg:grid-cols-4",
              e && e.length > 8 && " lg:grid-cols-8"
            ),
            children: e == null ? void 0 : e.map((n, o) => /* @__PURE__ */ d(
              Hs,
              {
                poli: n,
                index: o
              },
              n.id_spesialisasi
            ))
          }
        )
      ]
    }
  );
}
function Vs() {
  return /* @__PURE__ */ d("div", { className: "flex flex-col gap-5 w-full items-center bg-gradient-to-br from-slate-100 to-slate-200", children: [
    /* @__PURE__ */ d(Bs, {}),
    /* @__PURE__ */ d("div", { children: /* @__PURE__ */ d(qs, {}) })
  ] });
}
function Ks() {
  const t = j(B);
  if (!t)
    throw new Error("AppState context not found");
  return gr({
    mutationFn: async (e) => {
      console.log("Step 1: Mendapatkan kode booking");
      const r = await vr(t.baseUrl.value, t.usia.value);
      console.log("Step 2: Tambah antrian");
      const n = await mr(t.baseUrl.value, {
        ...r.metaData.response,
        ...e,
        is_antrian_loket: !0
      });
      return await yr(
        t.baseUrl.value,
        n.id_antrian,
        n.kode_booking
      ), console.log("Step 3: Lakukan checkin"), n;
    },
    onSuccess: (e) => {
      const r = window.innerWidth, n = window.innerHeight, o = window.screen.width / 2 - r / 2, i = window.screen.height / 2 - n / 2;
      window.open(
        `${t.baseUrl.value}/booking_poliklinik/cetak_antrian_loket_booking/${e.id_antrian}`,
        "_blank",
        "width=" + r + ", height=" + n + ", left=" + o + ", top=" + i
      ), window.opener ? window.opener.postMessage("taskCompleteAndClose", "*") : console.log(
        "Cannot find window.opener. This window cannot close itself."
      );
    },
    onSettled: () => {
      t.usia.value = "Asuransi", t.currentView.value = "initial", t.poliklinik.value = null;
    }
  });
}
function Ws({
  doctor: t,
  index: e,
  config: r,
  poliklinik: n
}) {
  var g;
  if (!j(B)) return /* @__PURE__ */ d("div", { children: "Context not found" });
  const [i, a] = H(!1), [s, l] = H(!1), u = Uo(t.sisa_kuota, t.kuota), h = t.sisa_kuota > 0, { mutate: c, isPending: p } = Ks(), f = () => {
    n && (c({
      id_dokter: t.id_dokter,
      id_poli: n.id_spesialisasi,
      id_jadwal_dokter: t.id_jadwal_dokter,
      kode_bpjs_poli: t.kode_bpjs_poli,
      nama_dokter: t.nama_dokter,
      kode_bpjs_dokter: t.kode_bpjs_dokter
    }), a(!0), l(!0), setTimeout(() => a(!1), 200), setTimeout(() => l(!1), 3e3));
  };
  return /* @__PURE__ */ d(
    qe,
    {
      className: ee(
        "relative overflow-hidden cursor-pointer select-none transition-all duration-300 ease-out animate-fade-in-up",
        h ? "hover:scale-105 active:scale-95" : "opacity-60 cursor-not-allowed",
        s ? "scale-95 shadow-inner" : "shadow-lg hover:shadow-xl",
        i && "ring-4 ring-blue-400/50",
        p && "ring-4 ring-orange-400/50 animate-pulse"
      ),
      style: { animationDelay: `${e * 100}ms` },
      onClick: () => f(),
      children: [
        s && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-white opacity-30 animate-ping rounded-lg" }),
        p && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-orange-500/30 flex items-center justify-center z-20", children: /* @__PURE__ */ d("div", { className: "flex flex-col items-center space-y-2", children: [
          /* @__PURE__ */ d("div", { className: "w-8 h-8 border-4 border-orange-500 border-t-transparent rounded-full animate-spin" }),
          /* @__PURE__ */ d("div", { className: "text-xs font-semibold text-orange-700", children: "Memproses..." })
        ] }) }),
        /* @__PURE__ */ d(
          "div",
          {
            className: `absolute inset-0 bg-gradient-to-br ${r.gradient} opacity-5`
          }
        ),
        /* @__PURE__ */ d(Le, { className: "p-6 space-y-4 relative z-10", children: [
          /* @__PURE__ */ d("div", { className: "flex items-center space-x-4", children: [
            /* @__PURE__ */ d(
              "div",
              {
                className: ee(
                  `w-16 h-16 bg-gradient-to-br ${r.gradient} rounded-full flex items-center justify-center text-white font-bold text-xl`,
                  s && "scale-110",
                  p && "animate-spin"
                ),
                children: ((g = t.nama_dokter.split(" ")[1]) == null ? void 0 : g[0]) || "D"
              }
            ),
            /* @__PURE__ */ d("div", { className: "flex-1", children: [
              /* @__PURE__ */ d("h3", { className: "text-lg font-bold text-gray-800", children: t.nama_dokter }),
              /* @__PURE__ */ d("p", { className: "text-sm text-gray-600", children: n == null ? void 0 : n.spesialisasi })
            ] })
          ] }),
          /* @__PURE__ */ d("div", { className: "flex justify-between items-center", children: [
            /* @__PURE__ */ d("div", { children: [
              /* @__PURE__ */ d("div", { className: "text-2xl font-bold text-gray-800", children: t.sisa_kuota }),
              /* @__PURE__ */ d("div", { className: "text-xs text-gray-600", children: [
                "dari ",
                t.kuota,
                " kuota"
              ] })
            ] }),
            /* @__PURE__ */ d("div", { className: "text-right space-y-2", children: /* @__PURE__ */ d(
              Do,
              {
                className: `${u.color} font-semibold px-3 py-1 text-xs block`,
                children: u.status
              }
            ) })
          ] }),
          h && /* @__PURE__ */ d("div", { className: "text-center", children: /* @__PURE__ */ d("div", { className: "text-xs text-gray-500 animate-bounce-subtle", children: "👆 Sentuh untuk pilih" }) })
        ] })
      ]
    }
  );
}
function Gs() {
  var r, n;
  const t = j(B);
  if (!t) return /* @__PURE__ */ d("div", { children: "Context not found" });
  if (!((n = (r = t.poliklinik) == null ? void 0 : r.value) != null && n.spesialisasi))
    return /* @__PURE__ */ d("div", { children: "Poliklinik not found" });
  const e = To(t.poliklinik.value.spesialisasi);
  return /* @__PURE__ */ d("div", { className: "min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 p-4 w-full rounded", children: /* @__PURE__ */ d("div", { className: "max-w-6xl mx-auto", children: [
    /* @__PURE__ */ d("div", { className: "flex items-center mb-6 animate-fade-in", children: [
      /* @__PURE__ */ d(
        bt,
        {
          variant: "outline",
          size: "lg",
          className: "mr-4 bg-white text-gray-700 hover:bg-gray-50",
          onClick: () => t.currentView.value = "noCode",
          children: [
            /* @__PURE__ */ d(br, { className: "h-5 w-5 mr-2" }),
            "Kembali"
          ]
        }
      ),
      /* @__PURE__ */ d("div", { className: "flex items-center space-x-4", children: [
        /* @__PURE__ */ d(
          "div",
          {
            className: `w-16 h-16 bg-gradient-to-br ${e.gradient} rounded-full flex items-center justify-center`,
            children: /* @__PURE__ */ d(e.icon, { className: "h-8 w-8 text-white" })
          }
        ),
        /* @__PURE__ */ d("div", { children: [
          /* @__PURE__ */ d("h1", { className: "text-3xl font-bold text-gray-800", children: t.poliklinik.value.spesialisasi }),
          /* @__PURE__ */ d("p", { className: "text-gray-600", children: "Pilih dokter yang tersedia" })
        ] })
      ] })
    ] }),
    /* @__PURE__ */ d("div", { className: "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6", children: t.poliklinik.value.doctors.map((o, i) => /* @__PURE__ */ d(
      Ws,
      {
        doctor: o,
        index: i,
        config: e,
        poliklinik: t.poliklinik.value
      },
      o.id_dokter
    )) })
  ] }) });
}
function Zs() {
  const t = j(B), [e, r] = H(null);
  if (!t) return /* @__PURE__ */ d("div", { children: "Context not found" });
  const n = (o) => {
    r(o), t.currentView.value = "noCode", t.usia.value = "Asuransi", setTimeout(() => {
      r(null);
    }, 200);
  };
  return /* @__PURE__ */ d("div", { className: "min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center p-4", children: /* @__PURE__ */ d("div", { className: "max-w-4xl mx-auto text-center space-y-12", children: [
    /* @__PURE__ */ d("div", { className: "flex items-center justify-center mb-6 animate-fade-in", children: [
      /* @__PURE__ */ d(
        bt,
        {
          onClick: () => t.currentView.value = "initial",
          variant: "outline",
          size: "lg",
          className: "mr-4 bg-white text-gray-700 hover:bg-gray-50 text-3xl",
          children: [
            /* @__PURE__ */ d(br, { className: "h-24 w-24 mr-2" }),
            /* @__PURE__ */ d("b", { children: "KEMBALI" })
          ]
        }
      ),
      /* @__PURE__ */ d("div", { className: "space-y-2", children: [
        /* @__PURE__ */ d("h1", { className: "text-4xl md:text-5xl font-bold text-gray-800", children: "PILIH JENIS BOOKING" }),
        /* @__PURE__ */ d("p", { className: "text-lg md:text-xl text-gray-600", children: "Apakah Anda menggunakan BPJS?" })
      ] })
    ] }),
    /* @__PURE__ */ d("div", { className: "grid grid-cols-1 md:grid-cols-2 gap-8 animate-fade-in-up", children: [
      /* @__PURE__ */ d(
        qe,
        {
          className: `
              relative overflow-hidden cursor-pointer select-none
              transition-all duration-300 ease-out
              hover:scale-105 active:scale-95
              ${e === "bpjs" ? "scale-95 shadow-inner" : "shadow-xl hover:shadow-2xl"}
              animate-fade-in-up
            `,
          style: { animationDelay: "200ms" },
          onClick: () => n("bpjs"),
          children: [
            e === "bpjs" && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-white opacity-30 animate-ping rounded-lg" }),
            /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-gradient-to-br from-teal-400 to-teal-600 opacity-5" }),
            /* @__PURE__ */ d(Le, { className: "p-8 text-center space-y-6 relative z-10", children: [
              /* @__PURE__ */ d("div", { className: "mx-auto w-20 h-20 bg-gradient-to-br from-teal-400 to-teal-600 rounded-full flex items-center justify-center text-white", children: /* @__PURE__ */ d(xs, { className: "h-10 w-10" }) }),
              /* @__PURE__ */ d("div", { children: /* @__PURE__ */ d("h1", { className: "text-4xl font-semibold text-teal-600", children: "BPJS" }) }),
              /* @__PURE__ */ d("p", { className: "text-gray-600 text-sm leading-relaxed", children: "Pendaftaran menggunakan kartu BPJS Kesehatan Anda" }),
              /* @__PURE__ */ d("div", { className: "text-xs text-gray-500 animate-bounce-subtle", children: "👆 Sentuh untuk pilih" })
            ] })
          ]
        }
      ),
      /* @__PURE__ */ d(
        qe,
        {
          className: `
              relative overflow-hidden cursor-pointer select-none
              transition-all duration-300 ease-out
              hover:scale-105 active:scale-95
              ${e === "non-bpjs" ? "scale-95 shadow-inner" : "shadow-xl hover:shadow-2xl"}
              animate-fade-in-up
            `,
          style: { animationDelay: "400ms" },
          onClick: () => n("non-bpjs"),
          children: [
            e === "non-bpjs" && /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-white opacity-30 animate-ping rounded-lg" }),
            /* @__PURE__ */ d("div", { className: "absolute inset-0 bg-gradient-to-br from-orange-400 to-orange-600 opacity-5" }),
            /* @__PURE__ */ d(Le, { className: "p-8 text-center space-y-6 relative z-10", children: [
              /* @__PURE__ */ d("div", { className: "mx-auto w-20 h-20 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white", children: /* @__PURE__ */ d(Es, { className: "h-10 w-10" }) }),
              /* @__PURE__ */ d("div", { children: /* @__PURE__ */ d("h1", { className: "text-4xl font-semibold text-orange-600", children: "NON BPJS" }) }),
              /* @__PURE__ */ d("p", { className: "text-gray-600 text-sm leading-relaxed", children: "Pendaftaran sebagai pasien umum atau asuransi lainnya" }),
              /* @__PURE__ */ d("div", { className: "text-xs text-gray-500 animate-bounce-subtle", children: "👆 Sentuh untuk pilih" })
            ] })
          ]
        }
      )
    ] })
  ] }) });
}
function Js() {
  const t = j(B);
  if (!t) return /* @__PURE__ */ d("div", { children: "Context not found" });
  if (t.currentView.value === "initial") return /* @__PURE__ */ d(fn, {});
  if (t.currentView.value === "hasCode") return /* @__PURE__ */ d(fn, {});
  if (t.currentView.value === "noCode") return /* @__PURE__ */ d(Vs, {});
  if (t.currentView.value === "selectInsurance") return /* @__PURE__ */ d(Zs, {});
  if (t.currentView.value === "listDokter") return /* @__PURE__ */ d(Gs, {});
}
function Ys() {
  return /* @__PURE__ */ d(Js, {});
}
function Xs({ styles: t, baseUrl: e }) {
  const r = j(B);
  return r ? (r.baseUrl.value = e, /* @__PURE__ */ d(K, { children: [
    /* @__PURE__ */ d("style", { children: t }),
    /* @__PURE__ */ d(Ys, {})
  ] })) : /* @__PURE__ */ d("div", { children: "Context not found" });
}
const el = new Gi(), tl = (t) => /* @__PURE__ */ d(B.Provider, { value: zi(), children: /* @__PURE__ */ d(ia, { client: el, children: /* @__PURE__ */ d(Xs, { styles: Mi, ...t }) }) }), rl = Si(tl, {
  shadow: "open",
  props: {
    baseUrl: "string"
  }
});
customElements.define("antrian-loket", rl);
