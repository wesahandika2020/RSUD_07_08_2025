counter = 0;

var message = "Sorry, right-click has been disabled";
var dWidth = $(window).width();
var dHeight= $(window).height();
var x = screen.width/2 - dWidth/2;
var y = screen.height/2 - dHeight/2;

function clickIE() {
    if (document.all) {
        (message);
        return false;
    }
}

function clickNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which == 2 || e.which == 3) {
            (message); return false;
        }
    }
}

function roundToTwo(num) {
    return parseFloat(Math.round(num * 100) / 100).toFixed(2);
}

function precise_round(num, decimals) {
    var t = Math.pow(10, decimals);
    return (Math.round((num * t) + (decimals > 0 ? 1 : 0) * (Math.sign(num) * (10 / Math.pow(100, decimals)))) / t).toFixed(decimals);
}

function numtocurr(a) {
    if (a !== null) {
        a = a.toString();
        var b = a.replace(/[^\d\,]/g, '');
        var dump = b.split(',');
        var c = '';
        var lengthchar = dump[0].length;
        var j = 0;
        for (var i = lengthchar; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = dump[0].substr(i - 1, 1) + '.' + c;
            } else {
                c = dump[0].substr(i - 1, 1) + c;
            }
        }

        if (dump.length > 1) {
            if (dump[1].length > 0) {
                c += ',' + dump[1];
            } else {
                c += ',';
            }
        }
        return c;
    } else {
        return '0';
    }
}

function money_format(num) {
    if (num >= 0) {
        if (num.toString().indexOf('.') !== -1) {
            var coma = roundToTwo(num).toString().split('.');
            var new_coma = numtocurr(coma[0]);
            var new_coma2 = '';
            if (coma[1] !== undefined && coma[1].length === 1) {
                new_coma2 = coma[1] + '0';
            }
            else if (coma[1] === undefined) {
                new_coma2 = '00';
            }
            else {
                new_coma2 = coma[1];
            }
            var new_num = new_coma + ',' + new_coma2;
            return new_num;
        } else {
            return numtocurr(num);
        }
    }
    if (num < 0) {
        if (Math.abs(num).toString().indexOf('.') !== -1) {
            var coma = roundToTwo(num).toString().split('.');
            var new_coma = numtocurr(coma[0]);
            var new_coma2 = '';

            if (((coma[1] !== undefined) ? coma[1] : '0').length === 1) {
                new_coma2 = ((coma[1] !== undefined) ? coma[1] : '0') + '0';
            } else {
                new_coma2 = coma[1];
            }
            var new_num = new_coma + ',' + new_coma2;
            return '-' + new_num;
        } else {
            return '-' + numtocurr(num);
        }
    }
}

function money_format_save(value) {
    var str = value.toString().split('.').join('');
    var new_str = str.replace(/,/g, '.');
    return new_str;
}

function clearMoneyFormat(obj) {
    var value = obj.value;
    var str = value.toString().split('.').join('');
    var new_str = str.replace(/,/g, '.');
    obj.value = new_str;
}

function setMoneyFormat(obj) {
    var value = obj.value;
    obj.value = money_format(value);
}

function IsNumeric(input) {
    return (input - 0) == input && (input + '').replace(/^\s+|\s+$/g, "").length > 0;
}
function strip(html) {
    var tmp = document.createElement("DIV");
    tmp.innerHTML = html;
    return tmp.textContent || tmp.innerText || "";
}
function pembulatan_seratus(angka) {
    var kelipatan = 100;
    var sisa = angka % kelipatan;
    if (sisa !== 0) {
        var kekurangan = kelipatan - sisa;
        var hasilBulat = angka + kekurangan;
        return Math.ceil(hasilBulat);
    } else {
        return Math.ceil(angka);
    }
}

//Format Nilai Uang
function number_format(a, b, c, d) {
    a = Math.round(a * Math.pow(10, b)) / Math.pow(10, b);
    e = a + '';
    f = e.split('.');
    if (!f[0]) {
        f[0] = '0';
    }
    if (!f[1]) {
        f[1] = '';
    }
    if (f[1].length < b) {
        g = f[1];
        for (i = f[1].length + 1; i <= b; i++) {
            g += '0';
        }
        f[1] = g;
    }
    if (d != '' && f[0].length > 3) {
        h = f[0];
        f[0] = '';
        for (j = 3; j < h.length; j += 3) {
            i = h.slice(h.length - j, h.length - j + 3);
            f[0] = d + i + f[0] + '';
        }
        j = h.substr(0, (h.length % 3 == 0) ? 3 : (h.length % 3));
        f[0] = j + f[0];
    }
    c = (b <= 0) ? '' : c;
    return f[0] + c + f[1];
}

//Menghitung Umur dari tanggal ditentukan

function hitungUmur(tanggal) {

    var elem = tanggal.split('-');
    var tahun = elem[0];
    var bulan = elem[1];
    var hari = elem[2];

    var now = new Date();
    var day = now.getUTCDate();
    var month = now.getUTCMonth() + 1;
    var year = now.getYear() + 1900;

    tahun = year - tahun;
    bulan = month - bulan;
    hari = day - hari;

    var jumlahHari;
    var bulanTemp = (month == 1) ? 12 : month - 1;
    if (bulanTemp == 1 || bulanTemp == 3 || bulanTemp == 5 || bulanTemp == 7 || bulanTemp == 8 || bulanTemp == 10 || bulanTemp == 12) {
        jumlahHari = 31;
    } else if (bulanTemp == 2) {
        if (tahun % 4 == 0)
            jumlahHari = 29;
        else
            jumlahHari = 28;
    } else {
        jumlahHari = 30;
    }

    if (hari <= 0) {
        hari += jumlahHari;
        bulan--;
    }
    if (bulan < 0 || (bulan == 0 && tahun != 0)) {
        bulan += 12;
        tahun--;
    }
    if (tanggal === '0000-00-00') {
        return "-";
    } else {
        return tahun + ' Tahun ' + bulan + ' Bulan ' + hari + ' Hari';
    }
}

function datefmysql(tanggal) {
    if (tanggal !== undefined && tanggal !== null && tanggal !== 'null') {
        var elem = tanggal.split('-');
        var tahun = elem[0];
        var bulan = elem[1];
        var hari = elem[2];
        return hari + '/' + bulan + '/' + tahun;
    } else {
        return '';
    }
}

function date2mysql(tgl) {
    var tanggal = tgl;
    var elem = tanggal.split('/');
    var tahun = elem[2];
    var bulan = elem[1];
    var hari = elem[0];
    return tahun + '-' + bulan + '-' + hari;
}



function datetimefmysql(waktu) {
    if ((waktu !== undefined) & (waktu !== null)) {
        var el = waktu.split(' ');
        var tgl = datefmysql(el[0]);
        var tm = el[1].split(':');
        return tgl + ' ' + tm[0] + ':' + tm[1];
    } else {
        return '-';
    }

}

function datetime2date(waktu) {
    if (waktu !== null) {
        var el = waktu.split(' ');
        var tgl = datefmysql(el[0]);
        return tgl;
    } else {
        return '-';
    }

}

function datetime2mysql(waktu) {
    var el = waktu.split(' ');
    var tgl = date2mysql(el[0]);
    var tm = el[1].split(':');
    return tgl + ' ' + tm[0] + ':' + tm[1];
}

function Angka(obj) {
    a = obj.value;
    b = a.replace(/[^\d]/g, '');
    c = '';
    lengthchar = b.length;
    j = 0;
    for (i = lengthchar; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + '' + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }
    obj.value = c;
}

// function FormNum(obj) {
//     a = obj.value;
//     b = a.replace(/[^\d]/g, '');
//     c = '';
//     lengthchar = b.length;
//     j = 0;
//     for (i = lengthchar; i > 0; i--) {
//         j = j + 1;
//         if (((j % 3) == 1) && (j != 1)) {
//             c = b.substr(i - 1, 1) + '.' + c;
//         } else {
//             c = b.substr(i - 1, 1) + c;
//         }
//     }
//     obj.value = c;
// }
function FormNum(obj) {
    var a = obj.value;
    /*b = a.replace(/[^\d]/g,'');
    c = '';
    lengthchar = b.length;
    j = 0;
    for (i = lengthchar; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                    c = b.substr(i-1,1) + '.' + c;
            } else {
                    c = b.substr(i-1,1) + c;
            }
    }*/
    if (a === '') {
        a = 0;
    }
    var c = money_format(currencyToNumber(a));
    obj.value = c;
}

function Desimal(obj) {
    a = obj.value;
    var reg = new RegExp(/[0-9]+(?:\.[0-9]{0,2})?/g)
    b = a.match(reg, '');
    if (b == null) {
        obj.value = '';
    } else {
        obj.value = b[0];
    }

}

function titikKeKoma(obj) {
    var a = obj.toString();
    var b = '';
    if (a != null) {
        b = a.replace(/\./g, ',');
    }
    return b;
}

function komaKeTitik(obj) {
    var a = obj.toString();
    var b = '';
    if (a != null) {
        b = a.replace(/\,/g, '.');
    }
    return b;
}

function numberToCurrency(a) {
    if (a !== null) {
        a = a.toString();
        var b = a.replace(/[^\d\,]/g, '');
        var dump = b.split(',');
        var c = '';
        var lengthchar = dump[0].length;
        var j = 0;
        for (var i = lengthchar; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = dump[0].substr(i - 1, 1) + '.' + c;
            } else {
                c = dump[0].substr(i - 1, 1) + c;
            }
        }

        if (dump.length > 1) {
            if (dump[1].length > 0) {
                c += ',' + dump[1];
            } else {
                c += ',';
            }
        }
        return c;
    } else {
        return '0';
    }
}


function currencyToNumber(a) {
    var c = '';
    if (a !== null && a !== undefined) {
        c = a.replace(/\.+/g, '');
    }
    return parseFloat(c);
}

function formatNumber(obj) {
    var a = obj.value;
    obj.value = numberToCurrency(a);
}


function removeMe(el) {
    var parent = el.parentNode;
    parent.parentNode.removeChild(parent);
}


function removeHtmlTag(strx) {
    if (strx.indexOf("<") != -1) {
        var s = strx.split("<");
        for (var i = 0; i < s.length; i++) {
            if (s[i].indexOf(">") != -1) {
                s[i] = s[i].substring(s[i].indexOf(">") + 1, s[i].length);
            }
        }
        strx = s.join(" ");
    }
    return strx;
}



function parseDate(str) {
    var m = str.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);
    return (m) ? new Date(m[3], m[2] - 1, m[1]) : null;
}

function isNama(str) {
    var reg = /^[a-zA-Z ]+$/g;
    return reg.test(str);
}

function getCookies(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}

function setCookies(c_name, value, exminutes) {
    var exdate = new Date();
    exdate.setMinutes(exdate.getMinutes() + exminutes, 0, 0);
    var c_value = escape(value) + ((exminutes == null) ? "" : "; expires=" + exdate.toUTCString());
    //alert(c_value+'-->'+exdate.getMinutes()+''+exminutes);
    document.cookie = c_name + "=" + c_value;
}

function checkEmpty(id, value, hasil) {
    if ($('#' + id).val() == '') {
        alert('Data ' + value + ' tidak boleh kosong !');
        $('#' + id).focus();
        hasil;
    }
}

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";

    var fixedName = '<%= Request["formName"] %>';
    name = fixedName + name;

    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

function ageByBirth(b) {
    // format tgl lahir = Y-m-d
    var format;
    try {
        var elem = b.split('-');
        var tahun = elem[0];
        var bulan = elem[1];
        var hari = elem[2];

        var now = new Date();
        var day = now.getUTCDate();
        var month = now.getUTCMonth() + 1;
        var year = now.getYear() + 1900;

        tahun = year - tahun;
        bulan = month - bulan;
        hari = day - hari;

        var jumlahHari;
        var bulanTemp = (month == 1) ? 12 : month - 1;
        if (bulanTemp == 1 || bulanTemp == 3 || bulanTemp == 5 || bulanTemp == 7 || bulanTemp == 8 || bulanTemp == 10 || bulanTemp == 12) {
            jumlahHari = 31;
        } else if (bulanTemp == 2) {
            if (tahun % 4 == 0)
                jumlahHari = 29;
            else
                jumlahHari = 28;
        } else {
            jumlahHari = 30;
        }

        if (hari <= 0) {
            hari += jumlahHari;
            bulan--;
        }
        if (bulan < 0 || (bulan == 0 && tahun != 0)) {
            bulan += 12;
            tahun--;
        }

        format = tahun + " Tahun " + bulan + " Bulan " + hari + " Hari";
    } catch (err) {
        format = "-";
    }
    return format;

}

function pagination(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
        start = 1;
    }

    if (finish > total_page) {
        finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

        if (p !== page) {
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:60px;"/><button type="button" class="btn btn-info btn-sm mb-1" title="Lompat ke halaman" onclick="gotopage(this, ' + tab + ')"><i class="fas fa-search"></i></button></li>' + '';
        }

    };



    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function pagination2(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging2(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging2(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging2(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging2(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
        start = 1;
    }

    if (finish > total_page) {
        finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

        if (p !== page) {
            page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging2(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page +'</a></li>' + '';
        }

    };



    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
}

function KuduAngka(obj) {
    a = obj.value;
    b = a.replace(/[^\d]/g, '');
    if (b.charAt(0) === '0') {
        b = b.substring(1, b.length)
    };
    c = '';
    lengthchar = b.length;
    j = 0;
    for (i = lengthchar; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + '' + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }

    if (c === '') {
        c = 0;
    };
    obj.value = c;
}

function gotopage(obj, tab) {
    var a = $(obj).prev().val();
    var b = parseInt(a);
    if (b === 0) {
        b = 1;
    };
    paging(b, tab);
}

function jump_page(jumlah, limit) {
    return round(jumlah / limit);
}


function page_summary(total_data, total_datapage, limit, page) {
    var start = ((page - 1) * limit) + 1;

    var finish = (start - 1) + total_datapage;
    if (finish < 1) {
        start = 0;
    };
    var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

    return str;
}

function syams_ajax(url, element) {
    $.ajax({
        url: url,
        dataType: '',
        success: function (response) {
            $(element).html(response);
        },
        error: function (e) {
            accessFailed(e.status);
        }
    });
}

function syams_validation(element, pesan) {
    $(element).next().remove();
    $(element).after('<div class="error mt-1" style="font-weight: normal; background: #f4f4f4; color: red; font-size: 12px;"><em>' + pesan + '</em></div>').closest('.form-control, .custom-select').removeClass('has-success').addClass('has-error is-invalid');
}

function syams_validation_remove(element) {
    $(element).next().remove();
    $(element).closest('.form-control, .custom-select').removeClass('has-error is-invalid');
}

function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
}

function get_date_app() {
    var d = new Date();
    var date = d.getDate();
    var month = d.getMonth();
    month++;

    if (month < 10) {
        month = '0' + String(month);
    };

    if (date < 10) {
        date = '0' + String(date);
    }
    return date + '/' + month + '/' + d.getFullYear() + ' ' + addZero(d.getHours()) + ':' + addZero(d.getMinutes());
}

function indo_tgl(date) {
    var buf = date.split('-');
    var bulan = ''
    switch (buf[1]) {
        case '01': bulan = 'Januari'; break;
        case '02': bulan = 'Februari'; break;
        case '03': bulan = 'Maret'; break;
        case '04': bulan = 'April'; break;
        case '05': bulan = 'Mei'; break;
        case '06': bulan = 'Juni'; break;
        case '07': bulan = 'Juli'; break;
        case '08': bulan = 'Agustus'; break;
        case '09': bulan = 'September'; break;
        case '10': bulan = 'Oktober'; break;
        case '11': bulan = 'November'; break;
        case '12': bulan = 'Desember'; break;

        default:
            break;
    }

    return buf[2] + " " + bulan + " " + buf[0];
}

function indo_periode_bulan(date) {
    var buf = date.split('-');
    var bulan = ''
    switch (buf[1]) {
        case '01': bulan = 'Januari'; break;
        case '02': bulan = 'Februari'; break;
        case '03': bulan = 'Maret'; break;
        case '04': bulan = 'April'; break;
        case '05': bulan = 'Mei'; break;
        case '06': bulan = 'Juni'; break;
        case '07': bulan = 'Juli'; break;
        case '08': bulan = 'Agustus'; break;
        case '09': bulan = 'September'; break;
        case '10': bulan = 'Oktober'; break;
        case '11': bulan = 'November'; break;
        case '12': bulan = 'Desember'; break;

        default:
            break;
    }

    return bulan + " " + buf[0];
}

function get_mont_format(date) {
    var buf = date.split('/');
    var bulan = ''
    switch (buf[0]) {
        case '1': bulan = 'Januari'; break;
        case '2': bulan = 'Februari'; break;
        case '3': bulan = 'Maret'; break;
        case '4': bulan = 'April'; break;
        case '5': bulan = 'Mei'; break;
        case '6': bulan = 'Juni'; break;
        case '7': bulan = 'Juli'; break;
        case '8': bulan = 'Agustus'; break;
        case '9': bulan = 'September'; break;
        case '10': bulan = 'Oktober'; break;
        case '11': bulan = 'November'; break;
        case '12': bulan = 'Desember'; break;

        default:
            break;
    }

    return bulan + " " + buf[1];
}

function romanize(num) {
    if (!+num)
        return false;
    var digits = String(+num).split(""),
        key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
            "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
            "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
        roman = "",
        i = 3;
    while (i--)
        roman = (key[+digits.pop() + (i * 10)] || "") + roman;
    return Array(+digits.join("") + 1).join("M") + roman;
}

function deromanize(str) {
    var str = str.toUpperCase(),
        validator = /^M*(?:D?C{0,3}|C[MD])(?:L?X{0,3}|X[CL])(?:V?I{0,3}|I[XV])$/,
        token = /[MDLV]|C[MD]?|X[CL]?|I[XV]?/g,
        key = { M: 1000, CM: 900, D: 500, CD: 400, C: 100, XC: 90, L: 50, XL: 40, X: 10, IX: 9, V: 5, IV: 4, I: 1 },
        num = 0, m;
    if (!(str && validator.test(str)))
        return false;
    while (m = token.exec(str))
        num += key[m[0]];
    return num;
}

function timeSince(date) {

    var seconds = Math.floor((new Date() - date) / 1000);

    var interval = Math.floor(seconds / 31536000);

    if (interval > 1) {
        return interval + " years";
    }
    interval = Math.floor(seconds / 2592000);
    if (interval > 1) {
        return interval + " months";
    }
    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + " days";
    }
    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + " hours";
    }
    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + " minutes";
    }
    return Math.floor(seconds) + " seconds";
}

function strtotime(d) {
    return new Date(d).getTime();
}

function updateScroll(element_id){
    var element = document.getElementById(element_id);
    element.scrollTop = element.scrollHeight;
}

function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    });
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    console.log(charCode)
    if (charCode == 47) return false; 
    if (charCode == 45) return false;
    if (charCode > 31 && (charCode < 45 || charCode > 57) && charCode > 32)
        return false;
    return true;
}

function showErrorValidate(element, error_string, data) {
    if (data.error_string[error_string]) {
        syams_validation(element, data.error_string[error_string]);
    }
}

function datetimenow() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    if (month.toString().length == 1) {
        var month = '0' + month;
    }
    if (day.toString().length == 1) {
        var day = '0' + day;
    }
    if (hour.toString().length == 1) {
        var hour = '0' + hour;
    }
    if (minute.toString().length == 1) {
        var minute = '0' + minute;
    }
    if (second.toString().length == 1) {
        var second = '0' + second;
    }
    var dateTime = year + '-' + month + '-' + day;
    return indo_tgl(dateTime) + ' ' + hour + ':' + minute + ':' + second;;
}

function datenow() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();

    if (month.toString().length == 1) {
        var month = '0' + month;
    }
    if (day.toString().length == 1) {
        var day = '0' + day;
    }
    var dateTime = year + '-' + month + '-' + day;
    return dateTime;
}

function keabnormalan(par = null){
    var data = {
        Ya: {
            label: 'Abnormal'
        },
        Tidak: {
            label: 'Normal'
        }
    };

    var hasil = data;
    if (par != null) {
        hasil = data[par];
    }

    return hasil;
}

function date_time(id, opsi='val') {
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    h = date.getHours();
    if(h<10) {
            h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10) {
            m = "0"+m;
    }
    s = date.getSeconds();
    if(s<10) {
            s = "0"+s;
    }
    if (d < 10) {
        d = "0"+d;
    }
    result = d+'/'+months[month]+'/'+year+' '+h+':'+m+':'+s;
    if (opsi === 'html') {
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'", "'+opsi+'");','1000');
    } else {
        if (document.getElementById(id).value !== null) {
            document.getElementById(id).value = result;
            setTimeout('date_time("'+id+'", "'+opsi+'");','1000');
        }
    }
    
    return true;
}

function time(id, opsi='val') {
    date = new Date;
    h = date.getHours();
    if(h<10) {
            h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10) {
            m = "0"+m;
    }
    s = date.getSeconds();
    if(s<10) {
            s = "0"+s;
    }

    result = h+':'+m+':'+s;
    if (opsi === 'html') {
        document.getElementById(id).innerHTML = result;
        setTimeout('time("'+id+'", "'+opsi+'");','1000');
    } else {
        if (document.getElementById(id).value !== null) {
            document.getElementById(id).value = result;
            setTimeout('time("'+id+'", "'+opsi+'");','1000');
        }
    }
    
    return true;
}

function dateTimeX(id, opsi) {
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    h = date.getHours();
    if(h<10) {
            h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10) {
            m = "0"+m;
    }
    s = date.getSeconds();
    if(s<10) {
            s = "0"+s;
    }
    if (d < 10) {
        d = "0"+d;
    }
    result = d+'/'+months[month]+'/'+year+' '+h+':'+m+':'+s;
    if (opsi === 'html') {
        document.getElementById(id).innerHTML = result;
        setTimeout('dateTimeX("'+id+'", "'+opsi+'");','1000');
    } else {
        //document.getElementById(id).value = result;
        setTimeout('dateTimeX("'+id+'", "'+opsi+'");','1000');    
    }
    //console.log(id);
    return true;
}

function messageAddSuccess() {
    toastr.success('Data telah berhasil disimpan!', 'Success', {
        toastClass: 'toast',
        containerId: 'toast-container',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        showEasing: 'swing',
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        timeOut: '1500',
        positionClass: 'toast-bottom-right'
    });
}

function messageDeleteSuccess() {
    toastr.success('Data telah berhasil dihapus!', 'Success', {
        toastClass: 'toast',
        containerId: 'toast-container',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        showEasing: 'swing',
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        timeOut: '1500',
        positionClass: 'toast-bottom-right'
    });
}

function messageEditSuccess() {
    toastr.success('Data telah berhasil diubah!', 'Success', {
        toastClass: 'toast',
        containerId: 'toast-container',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        showEasing: 'swing',
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        timeOut: '1500',
        positionClass: 'toast-bottom-right'
    });
}

function messageAddFailed() {
    toastr.error("Gagal menambah data!", "Error", {
      toastClass: "toast",
      containerId: "toast-container",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      showEasing: "swing",
      newestOnTop: true,
      progressBar: true,
      closeButton: true,
      timeOut: "1500",
      positionClass: "toast-bottom-right",
    });
}

function messageEditFailed() {
    toastr.error("Gagal mengubah data!", "Error", {
      toastClass: "toast",
      containerId: "toast-container",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      showEasing: "swing",
      newestOnTop: true,
      progressBar: true,
      closeButton: true,
      timeOut: "1500",
      positionClass: "toast-bottom-right",
    });
}

function messageDeleteFailed() {
    toastr.error("Gagal menghapus data!", "Error", {
      toastClass: "toast",
      containerId: "toast-container",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      showEasing: "swing",
      newestOnTop: true,
      progressBar: true,
      closeButton: true,
      timeOut: "1500",
      positionClass: "toast-bottom-right",
    });
}

function messageCustom(message, type) {
    if (type == 'Success') {
        toastr.success(message, type, {
            toastClass: 'toast',
            containerId: 'toast-container',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            showEasing: 'swing',
            newestOnTop: false,
            progressBar: true,
            closeButton: true,
            timeOut: '500',
            positionClass: 'toast-bottom-right'
        });
    } else if (type == 'Error') {
        toastr.error(message, type, {
          toastClass: "toast",
          containerId: "toast-container",
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          showEasing: "swing",
          newestOnTop: false,
          progressBar: true,
          closeButton: true,
          timeOut: "1500",
          positionClass: "toast-bottom-right",
        });
    } else if (type == 'Info') {
        toastr.info(message, type, {
          toastClass: "toast",
          containerId: "toast-container",
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          showEasing: "swing",
          newestOnTop: false,
          progressBar: true,
          closeButton: true,
          timeOut: "1500",
          positionClass: "toast-bottom-right",
        });
    }

}

function accessFailed() {
    let message = 'Gagal mengakes data';
    let type = 'Error';
    if (status === 404) {
        message = 'The data you requested does not exist';
        type = 'info';
    }

    toastr.error(message, type, {
      toastClass: "toast",
      containerId: "toast-container",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      showEasing: "swing",
      newestOnTop: true,
      progressBar: true,
      closeButton: true,
      timeOut: "1500",
      positionClass: "toast-bottom-right",
    });
}

function alertLogin(message, type) {
    if (type == 'Success') {
        toastr.success(message, type, {
          toastClass: "toast",
          containerId: "toast-container",
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          showEasing: "swing",
          newestOnTop: false,
          progressBar: true,
          closeButton: true,
          timeOut: "1500",
          positionClass: "toast-bottom-right",
        });
    } else if (type == 'Error') {
        toastr.error(message, type, {
          toastClass: "toast",
          containerId: "toast-container",
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          showEasing: "swing",
          newestOnTop: false,
          progressBar: true,
          closeButton: true,
          timeOut: "1500",
          positionClass: "toast-bottom-right",
        });
    } else if (type == 'Info') {
        toastr.info(message, type, {
          toastClass: "toast",
          containerId: "toast-container",
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          showEasing: "swing",
          newestOnTop: false,
          progressBar: true,
          closeButton: true,
          timeOut: "1500",
          positionClass: "toast-bottom-right",
        });
    }

}

function dinamicAlert(str) {
    bootbox.dialog({
        message: str,
        title: "Peringatan",
        buttons: {
            success: {
                label: '<i class="fa fa-check-circle"></i> OK',
                className: "btn-info",
                callback: function () {

                }
            }
        }
    });
}

function customAlert(title, str) {
    bootbox.dialog({
        message: str,
        title: title,
        buttons: {
            success: {
                label: '<i class="fa fa-check-circle"></i> OK',
                className: "btn-info",
                callback: function () {

                }
            }
        }
    });
}

function swalAlert(type, title, message) {
    Swal.fire({
        icon: type,
        title: title,
        html: message,
        showConfirmButton: true,
        allowOutsideClick: false,
        // timer: 2000
    });
}

function ToCurrency(obj){
    $(obj).val(numberToCurrency($(obj).val()));
}

function calculateAge(birthday) { // birthday is a date
    var ageDifMs = Date.now() - new Date(birthday);
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

function signatureAjax(url, paramsData, id, name = 'PEGAWAI') {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id : id,
            name : name,
            signature : paramsData,
        },
        dataType: 'JSON',
        success: function(data) {
            if (data.status) {
                messageCustom('Berhasil mengupload signature ' + name, 'Success');
            } else {
                messageCustom('Gagal mengupload signature ' + name, 'Error');
            }
        },
        error: function(e) {
            messageCustom('Gagal mengupload signature ' + name, 'Error');
        }
    });
}

function getAge(date) {
	if(date === '') {
		alert("Silahkan Masukkan Tanggal Lahir");
    } else {
		var today = new Date();
		var birthday = new Date(date);
		var year = 0;
		if (today.getMonth() < birthday.getMonth()) {
			year = 1;
		} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
			year = 1;
		}
		var age = today.getFullYear() - birthday.getFullYear() - year;
 
		if(age < 0){
			age = 0;
		}
        
        return age + ' Tahun';
	}
}

function clearValidate(e) {
    if (e.value !== '') {
        syams_validation_remove(e);
    }
}

function convertToCurrency(obj) {
    if ($(obj).val() !== '') {
        var conv = currencyToNumber($(obj).val());
        $(obj).val(numberToCurrency(conv));
    } else {
        $(obj).val(0);
    }
}

function notification(data) {
    if (typeof data === "string") {
        data = $.parseJSON(data);
    }
    var res = new Array;
    var hasil = '';

    // success
    try{
        var test = data['status']['success'][0];
        var success = data['status']['success'];
        if (success !== null) {
            res.push('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            res.push('<ul class="list-unstyled mb-n1">');
            $.each(success, function (key, value){
                res.push('<li>'+value['message']+'</li>');
            });
            res.push('</ul>');
            res.push('</div>');
        }
    }catch(err){}

    // error
    try{
        var test = data['status']['error'][0];
        var error = data['status']['error'];
        if (error !== null) {
            res.push('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            res.push('<ul class="list-unstyled mb-n1">');
            $.each(error, function (key, value){
                res.push('<li>'+value['message']+'</li>');
            });
            res.push('</ul>');
            res.push('</div>');
        }
    }catch(err){}

    // warning
    try{
        var test = data['status']['warning'][0];
        var warning = data['status']['warning'];
        if (warning !== null) {
            res.push('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            res.push('<ul class="list-unstyled mb-n1">');
            $.each(warning, function (key, value){
                res.push('<li>'+value['message']+'</li>');
            });
            res.push('</ul>');
            res.push('</div>');
        }
    }catch(err){}

    // info
    try{
        var test = data['status']['info'][0];
        var info = data['status']['info'];
        if (info !== null) {
            res.push('<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            res.push('<ul class="list-unstyled mb-n1">');
            $.each(info, function (key, value){
                res.push('<li>'+value['message']+'</li>');
            });
            res.push('</ul>');
            res.push('</div>');
        }
    }catch(err){}

    if (res.length > 0) {
        hasil = res.join(' ');
    }

    return hasil;
}

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function debounceTime(func, timeout) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

function getJustAge(date) {
	if (date === '') {
		alert("Silahkan Masukkan Tanggal Lahir");
	} else {
		var today = new Date();
		var birthday = new Date(date);
		var year = 0;
		if (today.getMonth() < birthday.getMonth()) {
			year = 1;
		} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
			year = 1;
		}
		var age = today.getFullYear() - birthday.getFullYear() - year;

		if (age < 0) {
			age = 0;
		}

		return age;
	}
}


// Contoh kata -> Contoh kata
function sentenceCase(input) {
	return input.charAt(0).toUpperCase() + input.slice(1).toLowerCase();
}

// contoh kata -> contoh kata
function lowercase(input) {
	return input.toLowerCase();
}

// contoh kata -> Contoh Kata
function capitalizeWords(input) {
	return input.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
}

// contoh kata -> CONTOH KATA
function uppercaseWords(input) {
	return input.toUpperCase();
}

// cONTOH kATA -> Contoh kata
function toggleCase(input) {
	return input.charAt(0).toLowerCase() + input.slice(1);
}