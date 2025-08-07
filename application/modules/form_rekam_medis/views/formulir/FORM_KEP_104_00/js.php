<!-- // RAK -->
<script>
    var nomer = 1;
        nomer++;
           
        function removeList(el) {
           var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        } 

        function removeListTable(el) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }

        function timerzmysql(waktu) {
            var tm = waktu.split(':');
            return tm[0] + ':' + tm[1];
        }

        function bukaLebar(title, num) {
            let html = /* html */ `
                <div class="accordion">
                    <div class="card">
                        <div class="card-header" id="heading-${num}">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                    ${title}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                            <div class="card-body">       
            `;

            return html;
        }

        function tutupRapet(title, num) {
            let html = /* html */ `
                            </div>
                        </div>
                    </div>
                </div>
            `;

            return html;
        } 

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#losp-rak, #edit-losp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-1, #edit-pagi-rak-1').prop('disabled', false);
                    $('#siang-rak-1, #edit-siang-rak-1').prop('disabled', false);
                    $('#malam-rak-1, #edit-malam-rak-1').prop('disabled', false);
                } else {
                    $('#pagi-rak-1, #edit-pagi-rak-1').val('');
                    $('#pagi-rak-1, #edit-pagi-rak-1').prop('disabled', true);
                    $('#siang-rak-1, #edit-siang-rak-1').val('');
                    $('#siang-rak-1, #edit-siang-rak-1').prop('disabled', true);
                    $('#malam-rak-1, #edit-malam-rak-1').val('');
                    $('#malam-rak-1, #edit-malam-rak-1').prop('disabled', true);
                }
            });
        })
       
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#ds3m-rak, #edit-ds3m-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-2, #edit-pagi-rak-2').prop('disabled', false);
                    $('#siang-rak-2, #edit-siang-rak-2').prop('disabled', false);
                    $('#malam-rak-2, #edit-malam-rak-2').prop('disabled', false);
                } else {
                    $('#pagi-rak-2, #edit-pagi-rak-2').val('');
                    $('#pagi-rak-2, #edit-pagi-rak-2').prop('disabled', true);
                    $('#siang-rak-2, #edit-siang-rak-2').val('');
                    $('#siang-rak-2, #edit-siang-rak-2').prop('disabled', true);
                    $('#malam-rak-2, #edit-malam-rak-2').val('');
                    $('#malam-rak-2, #edit-malam-rak-2').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#hks3m-rak, #edit-hks3m-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-3, #edit-pagi-rak-3').prop('disabled', false);
                    $('#siang-rak-3, #edit-siang-rak-3').prop('disabled', false);
                    $('#malam-rak-3, #edit-malam-rak-3').prop('disabled', false);
                } else {
                    $('#pagi-rak-3, #edit-pagi-rak-3').val('');
                    $('#pagi-rak-3, #edit-pagi-rak-3').prop('disabled', true);
                    $('#siang-rak-3, #edit-siang-rak-3').val('');
                    $('#siang-rak-3, #edit-siang-rak-3').prop('disabled', true);
                    $('#malam-rak-3, #edit-malam-rak-3').val('');
                    $('#malam-rak-3, #edit-malam-rak-3').prop('disabled', true);
                }
            });
        })
    
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#ns3m-rak, #edit-ns3m-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-4, #edit-pagi-rak-4').prop('disabled', false);
                    $('#siang-rak-4, #edit-siang-rak-4').prop('disabled', false);
                    $('#malam-rak-4, #edit-malam-rak-4').prop('disabled', false);
                } else {
                    $('#pagi-rak-4, #edit-pagi-rak-4').val('');
                    $('#pagi-rak-4, #edit-pagi-rak-4').prop('disabled', true);
                    $('#siang-rak-4, #edit-siang-rak-4').val('');
                    $('#siang-rak-4, #edit-siang-rak-4').prop('disabled', true);
                    $('#malam-rak-4, #edit-malam-rak-4').val('');
                    $('#malam-rak-4, #edit-malam-rak-4').prop('disabled', true);
                }
            });
        })
     
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#pss4j-rak, #edit-pss4j-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-5, #edit-pagi-rak-5').prop('disabled', false);
                    $('#siang-rak-5, #edit-siang-rak-5').prop('disabled', false);
                    $('#malam-rak-5, #edit-malam-rak-5').prop('disabled', false);
                } else {
                    $('#pagi-rak-5, #edit-pagi-rak-5').val('');
                    $('#pagi-rak-5, #edit-pagi-rak-5').prop('disabled', true);
                    $('#siang-rak-5, #edit-siang-rak-5').val('');
                    $('#siang-rak-5, #edit-siang-rak-5').prop('disabled', true);
                    $('#malam-rak-5, #edit-malam-rak-5').val('');
                    $('#malam-rak-5, #edit-malam-rak-5').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#tddss4j-rak, #edit-tddss4j-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-6, #edit-pagi-rak-6').prop('disabled', false);
                    $('#siang-rak-6, #edit-siang-rak-6').prop('disabled', false);
                    $('#malam-rak-6, #edit-malam-rak-6').prop('disabled', false);
                } else {
                    $('#pagi-rak-6, #edit-pagi-rak-6').val('');
                    $('#pagi-rak-6, #edit-pagi-rak-6').prop('disabled', true);
                    $('#siang-rak-6, #edit-siang-rak-6').val('');
                    $('#siang-rak-6, #edit-siang-rak-6').prop('disabled', true);
                    $('#malam-rak-6, #edit-malam-rak-6').val('');
                    $('#malam-rak-6, #edit-malam-rak-6').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#pus24j-rak, #edit-pus24j-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-7, #edit-pagi-rak-7').prop('disabled', false);
                    $('#siang-rak-7, #edit-siang-rak-7').prop('disabled', false);
                    $('#malam-rak-7, #edit-malam-rak-7').prop('disabled', false);
                } else {
                    $('#pagi-rak-7, #edit-pagi-rak-7').val('');
                    $('#pagi-rak-7, #edit-pagi-rak-7').prop('disabled', true);
                    $('#siang-rak-7, #edit-siang-rak-7').val('');
                    $('#siang-rak-7, #edit-siang-rak-7').prop('disabled', true);
                    $('#malam-rak-7, #edit-malam-rak-7').val('');
                    $('#malam-rak-7, #edit-malam-rak-7').prop('disabled', true);
                }
            });
        })
     
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#fiumpp-rak, #edit-fiumpp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-8, #edit-pagi-rak-8').prop('disabled', false);
                    $('#siang-rak-8, #edit-siang-rak-8').prop('disabled', false);
                    $('#malam-rak-8, #edit-malam-rak-8').prop('disabled', false);
                } else {
                    $('#pagi-rak-8, #edit-pagi-rak-8').val('');
                    $('#pagi-rak-8, #edit-pagi-rak-8').prop('disabled', true);
                    $('#siang-rak-8, #edit-siang-rak-8').val('');
                    $('#siang-rak-8, #edit-siang-rak-8').prop('disabled', true);
                    $('#malam-rak-8, #edit-malam-rak-8').val('');
                    $('#malam-rak-8, #edit-malam-rak-8').prop('disabled', true);
                }
            });
        })
        
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#fiumdm-rak, #edit-fiumdm-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-9, #edit-pagi-rak-9').prop('disabled', false);
                    $('#siang-rak-9, #edit-siang-rak-9').prop('disabled', false);
                    $('#malam-rak-9, #edit-malam-rak-9').prop('disabled', false);
                } else {
                    $('#pagi-rak-9, #edit-pagi-rak-9').val('');
                    $('#pagi-rak-9, #edit-pagi-rak-9').prop('disabled', true);
                    $('#siang-rak-9, #edit-siang-rak-9').val('');
                    $('#siang-rak-9, #edit-siang-rak-9').prop('disabled', true);
                    $('#malam-rak-9, #edit-malam-rak-9').val('');
                    $('#malam-rak-9, #edit-malam-rak-9').prop('disabled', true);
                }
            });
        })
     
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#fiub-rak, #edit-fiub-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-10, #edit-pagi-rak-10').prop('disabled', false);
                    $('#siang-rak-10, #edit-siang-rak-10').prop('disabled', false);
                    $('#malam-rak-10, #edit-malam-rak-10').prop('disabled', false);
                } else {
                    $('#pagi-rak-10, #edit-pagi-rak-10').val('');
                    $('#pagi-rak-10, #edit-pagi-rak-10').prop('disabled', true);
                    $('#siang-rak-10, #edit-siang-rak-10').val('');
                    $('#siang-rak-10, #edit-siang-rak-10').prop('disabled', true);
                    $('#malam-rak-10, #edit-malam-rak-10').val('');
                    $('#malam-rak-10, #edit-malam-rak-10').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#ajiumk-rak, #edit-ajiumk-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-11, #edit-pagi-rak-11').prop('disabled', false);
                    $('#siang-rak-11, #edit-siang-rak-11').prop('disabled', false);
                    $('#malam-rak-11, #edit-malam-rak-11').prop('disabled', false);
                } else {
                    $('#pagi-rak-11, #edit-pagi-rak-11').val('');
                    $('#pagi-rak-11, #edit-pagi-rak-11').prop('disabled', true);
                    $('#siang-rak-11, #edit-siang-rak-11').val('');
                    $('#siang-rak-11, #edit-siang-rak-11').prop('disabled', true);
                    $('#malam-rak-11, #edit-malam-rak-11').val('');
                    $('#malam-rak-11, #edit-malam-rak-11').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#atrumn-rak, #edit-atrumn-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-12, #edit-pagi-rak-12').prop('disabled', false);
                    $('#siang-rak-12, #edit-siang-rak-12').prop('disabled', false);
                    $('#malam-rak-12, #edit-malam-rak-12').prop('disabled', false);
                } else {
                    $('#pagi-rak-12, #edit-pagi-rak-12').val('');
                    $('#pagi-rak-12, #edit-pagi-rak-12').prop('disabled', true);
                    $('#siang-rak-12, #edit-siang-rak-12').val('');
                    $('#siang-rak-12, #edit-siang-rak-12').prop('disabled', true);
                    $('#malam-rak-12, #edit-malam-rak-12').val('');
                    $('#malam-rak-12, #edit-malam-rak-12').prop('disabled', true);
                }
            });
        })
       
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#lsppsh-rak, #edit-lsppsh-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-13, #edit-pagi-rak-13').prop('disabled', false);
                    $('#siang-rak-13, #edit-siang-rak-13').prop('disabled', false);
                    $('#malam-rak-13, #edit-malam-rak-13').prop('disabled', false);
                } else {
                    $('#pagi-rak-13, #edit-pagi-rak-13').val('');
                    $('#pagi-rak-13, #edit-pagi-rak-13').prop('disabled', true);
                    $('#siang-rak-13, #edit-siang-rak-13').val('');
                    $('#siang-rak-13, #edit-siang-rak-13').prop('disabled', true);
                    $('#malam-rak-13, #edit-malam-rak-13').val('');
                    $('#malam-rak-13, #edit-malam-rak-13').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#akumd-rak, #edit-akumd-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-14, #edit-pagi-rak-14').prop('disabled', false);
                    $('#siang-rak-14, #edit-siang-rak-14').prop('disabled', false);
                    $('#malam-rak-14, #edit-malam-rak-14').prop('disabled', false);
                } else {
                    $('#pagi-rak-14, #edit-pagi-rak-14').val('');
                    $('#pagi-rak-14, #edit-pagi-rak-14').prop('disabled', true);
                    $('#siang-rak-14, #edit-siang-rak-14').val('');
                    $('#siang-rak-14, #edit-siang-rak-14').prop('disabled', true);
                    $('#malam-rak-14, #edit-malam-rak-14').val('');
                    $('#malam-rak-14, #edit-malam-rak-14').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#bepdkk-rak, #edit-bepdkk-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-15, #edit-pagi-rak-15').prop('disabled', false);
                    $('#siang-rak-15, #edit-siang-rak-15').prop('disabled', false);
                    $('#malam-rak-15, #edit-malam-rak-15').prop('disabled', false);
                } else {
                    $('#pagi-rak-15, #edit-pagi-rak-15').val('');
                    $('#pagi-rak-15, #edit-pagi-rak-15').prop('disabled', true);
                    $('#siang-rak-15, #edit-siang-rak-15').val('');
                    $('#siang-rak-15, #edit-siang-rak-15').prop('disabled', true);
                    $('#malam-rak-15, #edit-malam-rak-15').val('');
                    $('#malam-rak-15, #edit-malam-rak-15').prop('disabled', true);
                }
            });
        })
      
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#bepp-rak, #edit-bepp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-16, #edit-pagi-rak-16').prop('disabled', false);
                    $('#siang-rak-16, #edit-siang-rak-16').prop('disabled', false);
                    $('#malam-rak-16, #edit-malam-rak-16').prop('disabled', false);
                } else {
                    $('#pagi-rak-16, #edit-pagi-rak-16').val('');
                    $('#pagi-rak-16, #edit-pagi-rak-16').prop('disabled', true);
                    $('#siang-rak-16, #edit-siang-rak-16').val('');
                    $('#siang-rak-16, #edit-siang-rak-16').prop('disabled', true);
                    $('#malam-rak-16, #edit-malam-rak-16').val('');
                    $('#malam-rak-16, #edit-malam-rak-16').prop('disabled', true);
                }
            });
        })
     
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#BetI-rak, #edit-BetI-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-17, #edit-pagi-rak-17').prop('disabled', false);
                    $('#siang-rak-17, #edit-siang-rak-17').prop('disabled', false);
                    $('#malam-rak-17, #edit-malam-rak-17').prop('disabled', false);
                } else {
                    $('#pagi-rak-17, #edit-pagi-rak-17').val('');
                    $('#pagi-rak-17, #edit-pagi-rak-17').prop('disabled', true);
                    $('#siang-rak-17, #edit-siang-rak-17').val('');
                    $('#siang-rak-17, #edit-siang-rak-17').prop('disabled', true);
                    $('#malam-rak-17, #edit-malam-rak-17').val('');
                    $('#malam-rak-17, #edit-malam-rak-17').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Saap-rak, #edit-Saap-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-18, #edit-pagi-rak-18').prop('disabled', false);
                    $('#siang-rak-18, #edit-siang-rak-18').prop('disabled', false);
                    $('#malam-rak-18, #edit-malam-rak-18').prop('disabled', false);
                } else {
                    $('#pagi-rak-18, #edit-pagi-rak-18').val('');
                    $('#pagi-rak-18, #edit-pagi-rak-18').prop('disabled', true);
                    $('#siang-rak-18, #edit-siang-rak-18').val('');
                    $('#siang-rak-18, #edit-siang-rak-18').prop('disabled', true);
                    $('#malam-rak-18, #edit-malam-rak-18').val('');
                    $('#malam-rak-18, #edit-malam-rak-18').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kddaadpt-rak, #edit-Kddaadpt-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-19, #edit-pagi-rak-19').prop('disabled', false);
                    $('#siang-rak-19, #edit-siang-rak-19').prop('disabled', false);
                    $('#malam-rak-19, #edit-malam-rak-19').prop('disabled', false);
                } else {
                    $('#pagi-rak-19, #edit-pagi-rak-19').val('');
                    $('#pagi-rak-19, #edit-pagi-rak-19').prop('disabled', true);
                    $('#siang-rak-19, #edit-siang-rak-19').val('');
                    $('#siang-rak-19, #edit-siang-rak-19').prop('disabled', true);
                    $('#malam-rak-19, #edit-malam-rak-19').val('');
                    $('#malam-rak-19, #edit-malam-rak-19').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#LoDdkj-rak, #edit-LoDdkj-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-20, #edit-pagi-rak-20').prop('disabled', false);
                    $('#siang-rak-20, #edit-siang-rak-20').prop('disabled', false);
                    $('#malam-rak-20, #edit-malam-rak-20').prop('disabled', false);
                } else {
                    $('#pagi-rak-20, #edit-pagi-rak-20').val('');
                    $('#pagi-rak-20, #edit-pagi-rak-20').prop('disabled', true);
                    $('#siang-rak-20, #edit-siang-rak-20').val('');
                    $('#siang-rak-20, #edit-siang-rak-20').prop('disabled', true);
                    $('#malam-rak-20, #edit-malam-rak-20').val('');
                    $('#malam-rak-20, #edit-malam-rak-20').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Logj-rak, #edit-Logj-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-21, #edit-pagi-rak-21').prop('disabled', false);
                    $('#siang-rak-21, #edit-siang-rak-21').prop('disabled', false);
                    $('#malam-rak-21, #edit-malam-rak-21').prop('disabled', false);
                } else {
                    $('#pagi-rak-21, #edit-pagi-rak-21').val('');
                    $('#pagi-rak-21, #edit-pagi-rak-21').prop('disabled', true);
                    $('#siang-rak-21, #edit-siang-rak-21').val('');
                    $('#siang-rak-21, #edit-siang-rak-21').prop('disabled', true);
                    $('#malam-rak-21, #edit-malam-rak-21').val('');
                    $('#malam-rak-21, #edit-malam-rak-21').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#siapkan-rak, #edit-siapkan-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-22, #edit-pagi-rak-22').prop('disabled', false);
                    $('#siang-rak-22, #edit-siang-rak-22').prop('disabled', false);
                    $('#malam-rak-22, #edit-malam-rak-22').prop('disabled', false);
                } else {
                    $('#pagi-rak-22, #edit-pagi-rak-22').val('');
                    $('#pagi-rak-22, #edit-pagi-rak-22').prop('disabled', true);
                    $('#siang-rak-22, #edit-siang-rak-22').val('');
                    $('#siang-rak-22, #edit-siang-rak-22').prop('disabled', true);
                    $('#malam-rak-22, #edit-malam-rak-22').val('');
                    $('#malam-rak-22, #edit-malam-rak-22').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kddaadp-rak, #edit-Kddaadp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-23, #edit-pagi-rak-23').prop('disabled', false);
                    $('#siang-rak-23, #edit-siang-rak-23').prop('disabled', false);
                    $('#malam-rak-23, #edit-malam-rak-23').prop('disabled', false);
                } else {
                    $('#pagi-rak-23, #edit-pagi-rak-23').val('');
                    $('#pagi-rak-23, #edit-pagi-rak-23').prop('disabled', true);
                    $('#siang-rak-23, #edit-siang-rak-23').val('');
                    $('#siang-rak-23, #edit-siang-rak-23').prop('disabled', true);
                    $('#malam-rak-23, #edit-malam-rak-23').val('');
                    $('#malam-rak-23, #edit-malam-rak-23').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#PtkII-rak, #edit-PtkII-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-24, #edit-pagi-rak-24').prop('disabled', false);
                    $('#siang-rak-24, #edit-siang-rak-24').prop('disabled', false);
                    $('#malam-rak-24, #edit-malam-rak-24').prop('disabled', false);
                } else {
                    $('#pagi-rak-24, #edit-pagi-rak-24').val('');
                    $('#pagi-rak-24, #edit-pagi-rak-24').prop('disabled', true);
                    $('#siang-rak-24, #edit-siang-rak-24').val('');
                    $('#siang-rak-24, #edit-siang-rak-24').prop('disabled', true);
                    $('#malam-rak-24, #edit-malam-rak-24').val('');
                    $('#malam-rak-24, #edit-malam-rak-24').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Api-rak, #edit-Api-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-25, #edit-pagi-rak-25').prop('disabled', false);
                    $('#siang-rak-25, #edit-siang-rak-25').prop('disabled', false);
                    $('#malam-rak-25, #edit-malam-rak-25').prop('disabled', false);
                } else {
                    $('#pagi-rak-25, #edit-pagi-rak-25').val('');
                    $('#pagi-rak-25, #edit-pagi-rak-25').prop('disabled', true);
                    $('#siang-rak-25, #edit-siang-rak-25').val('');
                    $('#siang-rak-25, #edit-siang-rak-25').prop('disabled', true);
                    $('#malam-rak-25, #edit-malam-rak-25').val('');
                    $('#malam-rak-25, #edit-malam-rak-25').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#PkII-rak, #edit-PkII-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-26, #edit-pagi-rak-26').prop('disabled', false);
                    $('#siang-rak-26, #edit-siang-rak-26').prop('disabled', false);
                    $('#malam-rak-26, #edit-malam-rak-26').prop('disabled', false);
                } else {
                    $('#pagi-rak-26, #edit-pagi-rak-26').val('');
                    $('#pagi-rak-26, #edit-pagi-rak-26').prop('disabled', true);
                    $('#siang-rak-26, #edit-siang-rak-26').val('');
                    $('#siang-rak-26, #edit-siang-rak-26').prop('disabled', true);
                    $('#malam-rak-26, #edit-malam-rak-26').val('');
                    $('#malam-rak-26, #edit-malam-rak-26').prop('disabled', true);
                }
            });
        })

        
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Pmjah-rak, #edit-Pmjah-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-27, #edit-pagi-rak-27').prop('disabled', false);
                    $('#siang-rak-27, #edit-siang-rak-27').prop('disabled', false);
                    $('#malam-rak-27, #edit-malam-rak-27').prop('disabled', false);
                } else {
                    $('#pagi-rak-27, #edit-pagi-rak-27').val('');
                    $('#pagi-rak-27, #edit-pagi-rak-27').prop('disabled', true);
                    $('#siang-rak-27, #edit-siang-rak-27').val('');
                    $('#siang-rak-27, #edit-siang-rak-27').prop('disabled', true);
                    $('#malam-rak-27, #edit-malam-rak-27').val('');
                    $('#malam-rak-27, #edit-malam-rak-27').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#oDsm-rak, #edit-oDsm-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-28, #edit-pagi-rak-28').prop('disabled', false);
                    $('#siang-rak-28, #edit-siang-rak-28').prop('disabled', false);
                    $('#malam-rak-28, #edit-malam-rak-28').prop('disabled', false);
                } else {
                    $('#pagi-rak-28, #edit-pagi-rak-28').val('');
                    $('#pagi-rak-28, #edit-pagi-rak-28').prop('disabled', true);
                    $('#siang-rak-28, #edit-siang-rak-28').val('');
                    $('#siang-rak-28, #edit-siang-rak-28').prop('disabled', true);
                    $('#malam-rak-28, #edit-malam-rak-28').val('');
                    $('#malam-rak-28, #edit-malam-rak-28').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Pk-rak, #edit-Pk-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-29, #edit-pagi-rak-29').prop('disabled', false);
                    $('#siang-rak-29, #edit-siang-rak-29').prop('disabled', false);
                    $('#malam-rak-29, #edit-malam-rak-29').prop('disabled', false);
                } else {
                    $('#pagi-rak-29, #edit-pagi-rak-29').val('');
                    $('#pagi-rak-29, #edit-pagi-rak-29').prop('disabled', true);
                    $('#siang-rak-29, #edit-siang-rak-29').val('');
                    $('#siang-rak-29, #edit-siang-rak-29').prop('disabled', true);
                    $('#malam-rak-29, #edit-malam-rak-29').val('');
                    $('#malam-rak-29, #edit-malam-rak-29').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lebp-rak, #edit-Lebp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-30, #edit-pagi-rak-30').prop('disabled', false);
                    $('#siang-rak-30, #edit-siang-rak-30').prop('disabled', false);
                    $('#malam-rak-30, #edit-malam-rak-30').prop('disabled', false);
                } else {
                    $('#pagi-rak-30, #edit-pagi-rak-30').val('');
                    $('#pagi-rak-30, #edit-pagi-rak-30').prop('disabled', true);
                    $('#siang-rak-30, #edit-siang-rak-30').val('');
                    $('#siang-rak-30, #edit-siang-rak-30').prop('disabled', true);
                    $('#malam-rak-30, #edit-malam-rak-30').val('');
                    $('#malam-rak-30, #edit-malam-rak-30').prop('disabled', true);
                }
            });
        })

        
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lb-rak, #edit-Lb-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-31, #edit-pagi-rak-31').prop('disabled', false);
                    $('#siang-rak-31, #edit-siang-rak-31').prop('disabled', false);
                    $('#malam-rak-31, #edit-malam-rak-31').prop('disabled', false);
                } else {
                    $('#pagi-rak-31, #edit-pagi-rak-31').val('');
                    $('#pagi-rak-31, #edit-pagi-rak-31').prop('disabled', true);
                    $('#siang-rak-31, #edit-siang-rak-31').val('');
                    $('#siang-rak-31, #edit-siang-rak-31').prop('disabled', true);
                    $('#malam-rak-31, #edit-malam-rak-31').val('');
                    $('#malam-rak-31, #edit-malam-rak-31').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lbdpi-rak, #edit-Lbdpi-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-32, #edit-pagi-rak-32').prop('disabled', false);
                    $('#siang-rak-32, #edit-siang-rak-32').prop('disabled', false);
                    $('#malam-rak-32, #edit-malam-rak-32').prop('disabled', false);
                } else {
                    $('#pagi-rak-32, #edit-pagi-rak-32').val('');
                    $('#pagi-rak-32, #edit-pagi-rak-32').prop('disabled', true);
                    $('#siang-rak-32, #edit-siang-rak-32').val('');
                    $('#siang-rak-32, #edit-siang-rak-32').prop('disabled', true);
                    $('#malam-rak-32, #edit-malam-rak-32').val('');
                    $('#malam-rak-32, #edit-malam-rak-32').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Bjnb-rak, #edit-Bjnb-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-33, #edit-pagi-rak-33').prop('disabled', false);
                    $('#siang-rak-33, #edit-siang-rak-33').prop('disabled', false);
                    $('#malam-rak-33, #edit-malam-rak-33').prop('disabled', false);
                } else {
                    $('#pagi-rak-33, #edit-pagi-rak-33').val('');
                    $('#pagi-rak-33, #edit-pagi-rak-33').prop('disabled', true);
                    $('#siang-rak-33, #edit-siang-rak-33').val('');
                    $('#siang-rak-33, #edit-siang-rak-33').prop('disabled', true);
                    $('#malam-rak-33, #edit-malam-rak-33').val('');
                    $('#malam-rak-33, #edit-malam-rak-33').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kbslr-rak, #edit-Kbslr-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-34, #edit-pagi-rak-34').prop('disabled', false);
                    $('#siang-rak-34, #edit-siang-rak-34').prop('disabled', false);
                    $('#malam-rak-34, #edit-malam-rak-34').prop('disabled', false);
                } else {
                    $('#pagi-rak-34, #edit-pagi-rak-34').val('');
                    $('#pagi-rak-34, #edit-pagi-rak-34').prop('disabled', true);
                    $('#siang-rak-34, #edit-siang-rak-34').val('');
                    $('#siang-rak-34, #edit-siang-rak-34').prop('disabled', true);
                    $('#malam-rak-34, #edit-malam-rak-34').val('');
                    $('#malam-rak-34, #edit-malam-rak-34').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Gkyb-rak, #edit-Gkyb-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-35, #edit-pagi-rak-35').prop('disabled', false);
                    $('#siang-rak-35, #edit-siang-rak-35').prop('disabled', false);
                    $('#malam-rak-35, #edit-malam-rak-35').prop('disabled', false);
                } else {
                    $('#pagi-rak-35, #edit-pagi-rak-35').val('');
                    $('#pagi-rak-35, #edit-pagi-rak-35').prop('disabled', true);
                    $('#siang-rak-35, #edit-siang-rak-35').val('');
                    $('#siang-rak-35, #edit-siang-rak-35').prop('disabled', true);
                    $('#malam-rak-35, #edit-malam-rak-35').val('');
                    $('#malam-rak-35, #edit-malam-rak-35').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Nsabm-rak, #edit-Nsabm-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-36, #edit-pagi-rak-36').prop('disabled', false);
                    $('#siang-rak-36, #edit-siang-rak-36').prop('disabled', false);
                    $('#malam-rak-36, #edit-malam-rak-36').prop('disabled', false);
                } else {
                    $('#pagi-rak-36, #edit-pagi-rak-36').val('');
                    $('#pagi-rak-36, #edit-pagi-rak-36').prop('disabled', true);
                    $('#siang-rak-36, #edit-siang-rak-36').val('');
                    $('#siang-rak-36, #edit-siang-rak-36').prop('disabled', true);
                    $('#malam-rak-36, #edit-malam-rak-36').val('');
                    $('#malam-rak-36, #edit-malam-rak-36').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Cjk-rak, #edit-Cjk-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-37, #edit-pagi-rak-37').prop('disabled', false);
                    $('#siang-rak-37, #edit-siang-rak-37').prop('disabled', false);
                    $('#malam-rak-37, #edit-malam-rak-37').prop('disabled', false);
                } else {
                    $('#pagi-rak-37, #edit-pagi-rak-37').val('');
                    $('#pagi-rak-37, #edit-pagi-rak-37').prop('disabled', true);
                    $('#siang-rak-37, #edit-siang-rak-37').val('');
                    $('#siang-rak-37, #edit-siang-rak-37').prop('disabled', true);
                    $('#malam-rak-37, #edit-malam-rak-37').val('');
                    $('#malam-rak-37, #edit-malam-rak-37').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kddaakp-rak, #edit-Kddaakp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-38, #edit-pagi-rak-38').prop('disabled', false);
                    $('#siang-rak-38, #edit-siang-rak-38').prop('disabled', false);
                    $('#malam-rak-38, #edit-malam-rak-38').prop('disabled', false);
                } else {
                    $('#pagi-rak-38, #edit-pagi-rak-38').val('');
                    $('#pagi-rak-38, #edit-pagi-rak-38').prop('disabled', true);
                    $('#siang-rak-38, #edit-siang-rak-38').val('');
                    $('#siang-rak-38, #edit-siang-rak-38').prop('disabled', true);
                    $('#malam-rak-38, #edit-malam-rak-38').val('');
                    $('#malam-rak-38, #edit-malam-rak-38').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#ls1-rak, #edit-ls1-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-39, #edit-pagi-rak-39').prop('disabled', false);
                    $('#siang-rak-39, #edit-siang-rak-39').prop('disabled', false);
                    $('#malam-rak-39, #edit-malam-rak-39').prop('disabled', false);
                } else {
                    $('#pagi-rak-39, #edit-pagi-rak-39').val('');
                    $('#pagi-rak-39, #edit-pagi-rak-39').prop('disabled', true);
                    $('#siang-rak-39, #edit-siang-rak-39').val('');
                    $('#siang-rak-39, #edit-siang-rak-39').prop('disabled', true);
                    $('#malam-rak-39, #edit-malam-rak-39').val('');
                    $('#malam-rak-39, #edit-malam-rak-39').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Jdptp-rak, #edit-Jdptp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-40, #edit-pagi-rak-40').prop('disabled', false);
                    $('#siang-rak-40, #edit-siang-rak-40').prop('disabled', false);
                    $('#malam-rak-40, #edit-malam-rak-40').prop('disabled', false);
                } else {
                    $('#pagi-rak-40, #edit-pagi-rak-40').val('');
                    $('#pagi-rak-40, #edit-pagi-rak-40').prop('disabled', true);
                    $('#siang-rak-40, #edit-siang-rak-40').val('');
                    $('#siang-rak-40, #edit-siang-rak-40').prop('disabled', true);
                    $('#malam-rak-40, #edit-malam-rak-40').val('');
                    $('#malam-rak-40, #edit-malam-rak-40').prop('disabled', true);
                }
            });
        })





        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#FbuI-rak, #edit-FbuI-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-41, #edit-pagi-rak-41').prop('disabled', false);
                    $('#siang-rak-41, #edit-siang-rak-41').prop('disabled', false);
                    $('#malam-rak-41, #edit-malam-rak-41').prop('disabled', false);
                } else {
                    $('#pagi-rak-41, #edit-pagi-rak-41').val('');
                    $('#pagi-rak-41, #edit-pagi-rak-41').prop('disabled', true);
                    $('#siang-rak-41, #edit-siang-rak-41').val('');
                    $('#siang-rak-41, #edit-siang-rak-41').prop('disabled', true);
                    $('#malam-rak-41, #edit-malam-rak-41').val('');
                    $('#malam-rak-41, #edit-malam-rak-41').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Bidpp-rak, #edit-Bidpp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-42, #edit-pagi-rak-42').prop('disabled', false);
                    $('#siang-rak-42, #edit-siang-rak-42').prop('disabled', false);
                    $('#malam-rak-42, #edit-malam-rak-42').prop('disabled', false);
                } else {
                    $('#pagi-rak-42, #edit-pagi-rak-42').val('');
                    $('#pagi-rak-42, #edit-pagi-rak-42').prop('disabled', true);
                    $('#siang-rak-42, #edit-siang-rak-42').val('');
                    $('#siang-rak-42, #edit-siang-rak-42').prop('disabled', true);
                    $('#malam-rak-42, #edit-malam-rak-42').val('');
                    $('#malam-rak-42, #edit-malam-rak-42').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lptpt-rak, #edit-Lptpt-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-43, #edit-pagi-rak-43').prop('disabled', false);
                    $('#siang-rak-43, #edit-siang-rak-43').prop('disabled', false);
                    $('#malam-rak-43, #edit-malam-rak-43').prop('disabled', false);
                } else {
                    $('#pagi-rak-43, #edit-pagi-rak-43').val('');
                    $('#pagi-rak-43, #edit-pagi-rak-43').prop('disabled', true);
                    $('#siang-rak-43, #edit-siang-rak-43').val('');
                    $('#siang-rak-43, #edit-siang-rak-43').prop('disabled', true);
                    $('#malam-rak-43, #edit-malam-rak-43').val('');
                    $('#malam-rak-43, #edit-malam-rak-43').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#llp-rak, #edit-llp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-44, #edit-pagi-rak-44').prop('disabled', false);
                    $('#siang-rak-44, #edit-siang-rak-44').prop('disabled', false);
                    $('#malam-rak-44, #edit-malam-rak-44').prop('disabled', false);
                } else {
                    $('#pagi-rak-44, #edit-pagi-rak-44').val('');
                    $('#pagi-rak-44, #edit-pagi-rak-44').prop('disabled', true);
                    $('#siang-rak-44, #edit-siang-rak-44').val('');
                    $('#siang-rak-44, #edit-siang-rak-44').prop('disabled', true);
                    $('#malam-rak-44, #edit-malam-rak-44').val('');
                    $('#malam-rak-44, #edit-malam-rak-44').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Mum-rak, #edit-Mum-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-45, #edit-pagi-rak-45').prop('disabled', false);
                    $('#siang-rak-45, #edit-siang-rak-45').prop('disabled', false);
                    $('#malam-rak-45, #edit-malam-rak-45').prop('disabled', false);
                } else {
                    $('#pagi-rak-45, #edit-pagi-rak-45').val('');
                    $('#pagi-rak-45, #edit-pagi-rak-45').prop('disabled', true);
                    $('#siang-rak-45, #edit-siang-rak-45').val('');
                    $('#siang-rak-45, #edit-siang-rak-45').prop('disabled', true);
                    $('#malam-rak-45, #edit-malam-rak-45').val('');
                    $('#malam-rak-45, #edit-malam-rak-45').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Pjl-rak, #edit-Pjl-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-46, #edit-pagi-rak-46').prop('disabled', false);
                    $('#siang-rak-46, #edit-siang-rak-46').prop('disabled', false);
                    $('#malam-rak-46, #edit-malam-rak-46').prop('disabled', false);
                } else {
                    $('#pagi-rak-46, #edit-pagi-rak-46').val('');
                    $('#pagi-rak-46, #edit-pagi-rak-46').prop('disabled', true);
                    $('#siang-rak-46, #edit-siang-rak-46').val('');
                    $('#siang-rak-46, #edit-siang-rak-46').prop('disabled', true);
                    $('#malam-rak-46, #edit-malam-rak-46').val('');
                    $('#malam-rak-46, #edit-malam-rak-46').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Nkp-rak, #edit-Nkp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-47, #edit-pagi-rak-47').prop('disabled', false);
                    $('#siang-rak-47, #edit-siang-rak-47').prop('disabled', false);
                    $('#malam-rak-47, #edit-malam-rak-47').prop('disabled', false);
                } else {
                    $('#pagi-rak-47, #edit-pagi-rak-47').val('');
                    $('#pagi-rak-47, #edit-pagi-rak-47').prop('disabled', true);
                    $('#siang-rak-47, #edit-siang-rak-47').val('');
                    $('#siang-rak-47, #edit-siang-rak-47').prop('disabled', true);
                    $('#malam-rak-47, #edit-malam-rak-47').val('');
                    $('#malam-rak-47, #edit-malam-rak-47').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kddaakpy-rak, #edit-Kddaakpy-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-48, #edit-pagi-rak-48').prop('disabled', false);
                    $('#siang-rak-48, #edit-siang-rak-48').prop('disabled', false);
                    $('#malam-rak-48, #edit-malam-rak-48').prop('disabled', false);
                } else {
                    $('#pagi-rak-48, #edit-pagi-rak-48').val('');
                    $('#pagi-rak-48, #edit-pagi-rak-48').prop('disabled', true);
                    $('#siang-rak-48, #edit-siang-rak-48').val('');
                    $('#siang-rak-48, #edit-siang-rak-48').prop('disabled', true);
                    $('#malam-rak-48, #edit-malam-rak-48').val('');
                    $('#malam-rak-48, #edit-malam-rak-48').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lbttv-rak, #edit-Lbttv-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-49, #edit-pagi-rak-49').prop('disabled', false);
                    $('#siang-rak-49, #edit-siang-rak-49').prop('disabled', false);
                    $('#malam-rak-49, #edit-malam-rak-49').prop('disabled', false);
                } else {
                    $('#pagi-rak-49, #edit-pagi-rak-49').val('');
                    $('#pagi-rak-49, #edit-pagi-rak-49').prop('disabled', true);
                    $('#siang-rak-49, #edit-siang-rak-49').val('');
                    $('#siang-rak-49, #edit-siang-rak-49').prop('disabled', true);
                    $('#malam-rak-49, #edit-malam-rak-49').val('');
                    $('#malam-rak-49, #edit-malam-rak-49').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Pjll-rak, #edit-Pjll-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-50, #edit-pagi-rak-50').prop('disabled', false);
                    $('#siang-rak-50, #edit-siang-rak-50').prop('disabled', false);
                    $('#malam-rak-50, #edit-malam-rak-50').prop('disabled', false);
                } else {
                    $('#pagi-rak-50, #edit-pagi-rak-50').val('');
                    $('#pagi-rak-50, #edit-pagi-rak-50').prop('disabled', true);
                    $('#siang-rak-50, #edit-siang-rak-50').val('');
                    $('#siang-rak-50, #edit-siang-rak-50').prop('disabled', true);
                    $('#malam-rak-50, #edit-malam-rak-50').val('');
                    $('#malam-rak-50, #edit-malam-rak-50').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Gal-rak, #edit-Gal-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-51, #edit-pagi-rak-51').prop('disabled', false);
                    $('#siang-rak-51, #edit-siang-rak-51').prop('disabled', false);
                    $('#malam-rak-51, #edit-malam-rak-51').prop('disabled', false);
                } else {
                    $('#pagi-rak-51, #edit-pagi-rak-51').val('');
                    $('#pagi-rak-51, #edit-pagi-rak-51').prop('disabled', true);
                    $('#siang-rak-51, #edit-siang-rak-51').val('');
                    $('#siang-rak-51, #edit-siang-rak-51').prop('disabled', true);
                    $('#malam-rak-51, #edit-malam-rak-51').val('');
                    $('#malam-rak-51, #edit-malam-rak-51').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Lhp-rak, #edit-Lhp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-52, #edit-pagi-rak-52').prop('disabled', false);
                    $('#siang-rak-52, #edit-siang-rak-52').prop('disabled', false);
                    $('#malam-rak-52, #edit-malam-rak-52').prop('disabled', false);
                } else {
                    $('#pagi-rak-52, #edit-pagi-rak-52').val('');
                    $('#pagi-rak-52, #edit-pagi-rak-52').prop('disabled', true);
                    $('#siang-rak-52, #edit-siang-rak-52').val('');
                    $('#siang-rak-52, #edit-siang-rak-52').prop('disabled', true);
                    $('#malam-rak-52, #edit-malam-rak-52').val('');
                    $('#malam-rak-52, #edit-malam-rak-52').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kbpdp-rak, #edit-Kbpdp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-53, #edit-pagi-rak-53').prop('disabled', false);
                    $('#siang-rak-53, #edit-siang-rak-53').prop('disabled', false);
                    $('#malam-rak-53, #edit-malam-rak-53').prop('disabled', false);
                } else {
                    $('#pagi-rak-53, #edit-pagi-rak-53').val('');
                    $('#pagi-rak-53, #edit-pagi-rak-53').prop('disabled', true);
                    $('#siang-rak-53, #edit-siang-rak-53').val('');
                    $('#siang-rak-53, #edit-siang-rak-53').prop('disabled', true);
                    $('#malam-rak-53, #edit-malam-rak-53').val('');
                    $('#malam-rak-53, #edit-malam-rak-53').prop('disabled', true);
                }
            });
        })

        
        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Ottv-rak, #edit-Ottv-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-54, #edit-pagi-rak-54').prop('disabled', false);
                    $('#siang-rak-54, #edit-siang-rak-54').prop('disabled', false);
                    $('#malam-rak-54, #edit-malam-rak-54').prop('disabled', false);
                } else {
                    $('#pagi-rak-54, #edit-pagi-rak-54').val('');
                    $('#pagi-rak-54, #edit-pagi-rak-54').prop('disabled', true);
                    $('#siang-rak-54, #edit-siang-rak-54').val('');
                    $('#siang-rak-54, #edit-siang-rak-54').prop('disabled', true);
                    $('#malam-rak-54, #edit-malam-rak-54').val('');
                    $('#malam-rak-54, #edit-malam-rak-54').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Aium-rak, #edit-Aium-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-55, #edit-pagi-rak-55').prop('disabled', false);
                    $('#siang-rak-55, #edit-siang-rak-55').prop('disabled', false);
                    $('#malam-rak-55, #edit-malam-rak-55').prop('disabled', false);
                } else {
                    $('#pagi-rak-55, #edit-pagi-rak-55').val('');
                    $('#pagi-rak-55, #edit-pagi-rak-55').prop('disabled', true);
                    $('#siang-rak-55, #edit-siang-rak-55').val('');
                    $('#siang-rak-55, #edit-siang-rak-55').prop('disabled', true);
                    $('#malam-rak-55, #edit-malam-rak-55').val('');
                    $('#malam-rak-55, #edit-malam-rak-55').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Becpjp-rak, #edit-Becpjp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-56, #edit-pagi-rak-56').prop('disabled', false);
                    $('#siang-rak-56, #edit-siang-rak-56').prop('disabled', false);
                    $('#malam-rak-56, #edit-malam-rak-56').prop('disabled', false);
                } else {
                    $('#pagi-rak-56, #edit-pagi-rak-56').val('');
                    $('#pagi-rak-56, #edit-pagi-rak-56').prop('disabled', true);
                    $('#siang-rak-56, #edit-siang-rak-56').val('');
                    $('#siang-rak-56, #edit-siang-rak-56').prop('disabled', true);
                    $('#malam-rak-56, #edit-malam-rak-56').val('');
                    $('#malam-rak-56, #edit-malam-rak-56').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Betbpp-rak, #edit-Betbpp-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-57, #edit-pagi-rak-57').prop('disabled', false);
                    $('#siang-rak-57, #edit-siang-rak-57').prop('disabled', false);
                    $('#malam-rak-57, #edit-malam-rak-57').prop('disabled', false);
                } else {
                    $('#pagi-rak-57, #edit-pagi-rak-57').val('');
                    $('#pagi-rak-57, #edit-pagi-rak-57').prop('disabled', true);
                    $('#siang-rak-57, #edit-siang-rak-57').val('');
                    $('#siang-rak-57, #edit-siang-rak-57').prop('disabled', true);
                    $('#malam-rak-57, #edit-malam-rak-57').val('');
                    $('#malam-rak-57, #edit-malam-rak-57').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#PkRr-rak, #edit-PkRr-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-58, #edit-pagi-rak-58').prop('disabled', false);
                    $('#siang-rak-58, #edit-siang-rak-58').prop('disabled', false);
                    $('#malam-rak-58, #edit-malam-rak-58').prop('disabled', false);
                } else {
                    $('#pagi-rak-58, #edit-pagi-rak-58').val('');
                    $('#pagi-rak-58, #edit-pagi-rak-58').prop('disabled', true);
                    $('#siang-rak-58, #edit-siang-rak-58').val('');
                    $('#siang-rak-58, #edit-siang-rak-58').prop('disabled', true);
                    $('#malam-rak-58, #edit-malam-rak-58').val('');
                    $('#malam-rak-58, #edit-malam-rak-58').prop('disabled', true);
                }
            });
        })

        $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
            $('#Kddaa-rak, #edit-Kddaa-rak').click(function() {
                if ($(this).is(":checked")) {
                    $('#pagi-rak-59, #edit-pagi-rak-59').prop('disabled', false);
                    $('#siang-rak-59, #edit-siang-rak-59').prop('disabled', false);
                    $('#malam-rak-59, #edit-malam-rak-59').prop('disabled', false);
                } else {
                    $('#pagi-rak-59, #edit-pagi-rak-59').val('');
                    $('#pagi-rak-59, #edit-pagi-rak-59').prop('disabled', true);
                    $('#siang-rak-59, #edit-siang-rak-59').val('');
                    $('#siang-rak-59, #edit-siang-rak-59').prop('disabled', true);
                    $('#malam-rak-59, #edit-malam-rak-59').val('');
                    $('#malam-rak-59, #edit-malam-rak-59').prop('disabled', true);
                }
            });
        })

        function lihatFORM_KEP_104_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'lihat';
            entriRencanaAsuhanKebidanan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function editFORM_KEP_104_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'edit';
            entriRencanaAsuhanKebidanan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function tambahFORM_KEP_104_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'tambah';
            entriRencanaAsuhanKebidanan(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function entriRencanaAsuhanKebidanan(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action ) {
            // $('#modal_rencana_asuhan_keb').modal('show');                   
            // showRencanaAsuhanKebidanan(nomer); 

            $('#btn-simpan').hide();
            var groupAccount = '<?= $this->session->userdata('account_group') ?>';
            var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
            if (groupAccount == 'Admin') {
                profesi = 'Perawat';
            }

            if (action !== 'lihat') {
                $('#btn-simpan').show();
            } else {
                $('#btn-simpan').hide();
            } 

            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_data_kebidanan_asuhan_rencana") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function (data) {
                    // console.log(data);
                    resetFormRencanaAsuhanKebidanan(); 
                    $('#id-layanan-pendaftaran-rak').val(id_layanan_pendaftaran);
                    $('#id-pendaftaran-rak').val(id_pendaftaran);

                    if (data.pasien !== null) {
                        $('#id-pasien-rak').val(data.pasien.id_pasien);
                        $('#nama-pasien-rak').text(data.pasien.nama);
                        // $('#no-rm-rak').text(data.pasien.id);
                        $('#no-rm-rak').text(data.pasien.no_rm);
                        $('#tgl-lahir-rak').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                        $('#jenis-kelamin-rak').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));                       
                    }

                    // RAK TGL
                    $('#data-rencana-asuhan-kebidanan-104-00').one('click', function() {
                        $('#tanggal-rak, #edit-tanggal-rak').datetimepicker({
                            format: 'DD/MM/YYYY',
                            maxDate: new Date(),
                            beforeShow: function(i) {
                                if ($(i).attr('readonly')) {
                                    return false;
                                }
                            }
                        });
                    })

                
                    // RAK 
                    if (typeof data.kebidanan_asuhan_rencana !== 'undefined' && data.kebidanan_asuhan_rencana !== null) {
                        showRencanaAAsuhankebidanan(data.kebidanan_asuhan_rencana, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                        showRencanaAsuhanKebidanan(nomer);
                    } else {
                        $('#tabel-rak .body-table').empty();

                    }                 
                    $('#bed-rak').text(bed);
                    $('#modal_rencana_asuhan_keb').modal('show');                   
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }       

        function showRencanaAsuhanKebidanan(num) {
            let html = bukaLebar('Form Rencana Asuhan Kebidanan', num);
            html += /* html */ `
                    <table class="table table-no-border table-sm table-striped">
                        <tr>
                            <td>
                                <b>Tanggal
                            </td>
                            <td>
                                <b>:
                            </td>
                            <td>
                                <input type="text" name="tanggal_rak" id="tanggal-rak" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <th width="5%" class="center">no</th>
                                <th width="30%" class="center"><b>Diagnosa/Masalah/Kebutuhan</b></th>
                                <th width="30%" class="center"><b>Intervensi</b></th>
                                <th width="10%" class="center"><b>Pagi</b></th>
                                <th width="10%" class="center"><b>Siang</b></th>
                                <th width="10%" class="center"><b>Malam</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="center"> <b> 1 </b> </td>
                                <td> 
                                    G <input type="text" name="g_rak_1" id="g-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    P <input type="text" name="p_rak_1" id="p-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="a_rak_1" id="a-rak-1"class="custom-form clear-input d-inline-block col-lg-2">                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="losp_rak "id="losp-rak" value="1"class="mr-1">
                                    Lakukan observasi sesuai partograf    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_1 "id="pagi-rak-1" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_1 "id="siang-rak-1" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_1 "id="malam-rak-1" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Hamil <input type="text" name="hm_rak_1" id="hm-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> Minggu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ds3m_rak "id="ds3m-rak" value="1"class="mr-1">
                                    Djj setiap 30 menit   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_2 "id="pagi-rak-2" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_2 "id="siang-rak-2" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_2 "id="malam-rak-2" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="pkI_rak "id="pkI-rak" value="1"class="mr-1">  Persalinan Kala I
                                </td>  
                                <td> 
                                    <input type="checkbox" name="hks3m_rak "id="hks3m-rak" value="1"class="mr-1">
                                    His/kontraksi setiap 30 menit 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_3 "id="pagi-rak-3" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_3 "id="siang-rak-3" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_3 "id="malam-rak-3" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="bI_rak "id="bI-rak" value="1"class="mr-1">  Belum Inpartu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ns3m_rak "id="ns3m-rak" value="1"class="mr-1">
                                    Nadi setiap 30 menit 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_4 "id="pagi-rak-4" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_4 "id="siang-rak-4" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_4 "id="malam-rak-4" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="rptm_rak "id="rptm-rak" value="1"class="mr-1">  Resiko Persalinan tak maju
                                </td>  
                                <td> 
                                    <input type="checkbox" name="pss4j_rak "id="pss4j-rak" value="1"class="mr-1">
                                    Pembukaan serviks setiap 4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_5 "id="pagi-rak-5" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_5 "id="siang-rak-5" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_5 "id="malam-rak-5" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="cemas_rak "id="cemas-rak" value="1"class="mr-1">  Cemas
                                </td>  
                                <td> 
                                    <input type="checkbox" name="tddss4j_rak "id="tddss4j-rak" value="1"class="mr-1">
                                    Tekanan darah dan suhu setiap 4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_6 "id="pagi-rak-6" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_6 "id="siang-rak-6" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_6 "id="malam-rak-6" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="N_rak "id="N-rak" value="1"class="mr-1">  Nyeri
                                </td>  
                                <td> 
                                    <input type="checkbox" name="pus24j_rak "id="pus24j-rak" value="1"class="mr-1">
                                    Produksi urin setiap 2-4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_7 "id="pagi-rak-7" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_7 "id="siang-rak-7" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_7 "id="malam-rak-7" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="ke_rak "id="ke-rak" value="1"class="mr-1">  Kebutuhan edukasi
                                </td>  
                                <td> 
                                    <input type="checkbox" name="fiumpp_rak "id="fiumpp-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk memilih pendamping persalinan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_8 "id="pagi-rak-8" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_8 "id="siang-rak-8" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_8 "id="malam-rak-8" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="fiumdm_rak "id="fiumdm-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk makan dan minum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_9 "id="pagi-rak-9" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_9 "id="siang-rak-9" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_9 "id="malam-rak-9" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="fiub_rak "id="fiub-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk berkemih
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_10 "id="pagi-rak-10" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_10 "id="siang-rak-10" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_10 "id="malam-rak-10" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="ajiumk_rak "id="ajiumk-rak" value="1"class="mr-1">
                                    Anjurkan ibu untuk miring kiri
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_11 "id="pagi-rak-11" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_11 "id="siang-rak-11" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_11 "id="malam-rak-11" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="atrumn_rak "id="atrumn-rak" value="1"class="mr-1">
                                    Ajarkan teknik relaksi untuk mengurangi nyeri
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_12 "id="pagi-rak-12" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_12 "id="siang-rak-12" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_12 "id="malam-rak-12" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="lsppsh_rak "id="lsppsh-rak" value="1"class="mr-1">
                                    Lakukan sakral presure pada saat his
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_13 "id="pagi-rak-13" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_13 "id="siang-rak-13" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_13 "id="malam-rak-13" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="akumd_rak "id="akumd-rak" value="1"class="mr-1">
                                    Ajak keluarga untuk memberi dukungan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_14 "id="pagi-rak-14" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_14 "id="siang-rak-14" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_14 "id="malam-rak-14" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="bepdkk_rak "id="bepdkk-rak" value="1"class="mr-1">
                                    Berikan edukasi proses dan kemajuan kehamilan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_15 "id="pagi-rak-15" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_15 "id="siang-rak-15" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_15 "id="malam-rak-15" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="bepp_rak "id="bepp-rak" value="1"class="mr-1">
                                    Berikan edukasi posisi persalinan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_16 "id="pagi-rak-16" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_16 "id="siang-rak-16" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_16 "id="malam-rak-16" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="BetI_rak "id="BetI-rak" value="1"class="mr-1">
                                    Berikan edukasi tentang IMD
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_17 "id="pagi-rak-17" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_17 "id="siang-rak-17" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_17 "id="malam-rak-17" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            
                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Saap_rak "id="Saap-rak" value="1"class="mr-1">
                                    Siapkan alat-alat partus
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_18 "id="pagi-rak-18" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_18 "id="siang-rak-18" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_18 "id="malam-rak-18" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaadpt_rak "id="Kddaadpt-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_19 "id="pagi-rak-19" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_19 "id="siang-rak-19" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_19 "id="malam-rak-19" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 2 </b> </td>
                                <td> 
                                    Janin Presentasi <input type="text" name="JP_rak" id="JP-rak"class="custom-form clear-input d-inline-block col-lg-4">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="LoDdkj_rak "id="LoDdkj-rak" value="1"class="mr-1">
                                    Lakukan observasi DJJ dan kesejahteraan janin    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_20 "id="pagi-rak-20" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_20 "id="siang-rak-20" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_20 "id="malam-rak-20" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="TH_rak "id="TH-rak" value="1"class="mr-1">  Tunggal Hidup                                                                   
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Logj_rak "id="Logj-rak" value="1"class="mr-1">
                                    Lakukan observasi gerakan janin 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_21 "id="pagi-rak-21" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_21 "id="siang-rak-21" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_21 "id="malam-rak-21" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="kosong_rak "id="kosong-rak" value="1"class="mr-1">  
                                    <input type="text" name="kosoong_rak" id="kosoong-rak"class="custom-form clear-input d-inline-block col-lg-4">         
                                </td>  
                                <td> 
                                    <input type="checkbox" name="siapkan_rak "id="siapkan-rak" value="1"class="mr-1">
                                    Siapkan alat-alat resusitasi dan perlengkapan untuk bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_22 "id="pagi-rak-22" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_22 "id="siang-rak-22" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_22 "id="malam-rak-22" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rgj_rak "id="Rgj-rak" value="1"class="mr-1"> Resiko gawat janin          
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Kddaadp_rak "id="Kddaadp-rak" value="1"class="mr-1">
                                    Kalaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_23 "id="pagi-rak-23" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_23 "id="siang-rak-23" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_23 "id="malam-rak-23" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 3 </b> </td>
                                <td> 
                                    G <input type="text" name="GG_rak" id="GG-rak" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    P <input type="text" name="PP_rak" id="PP-rak" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="AA_rak" id="AA-rak" class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="PtkII_rak "id="PtkII-rak" value="1"class="mr-1">
                                    Pastikan tanda kala II    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_24 "id="pagi-rak-24" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_24 "id="siang-rak-24" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_24 "id="malam-rak-24" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Hamil <input type="text" name="Hmm_rak" id="Hmm-rak"class="custom-form clear-input d-inline-block col-lg-2"> Minggu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Api_rak "id="Api-rak" value="1"class="mr-1">
                                    Atur posisi ibu   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_25 "id="pagi-rak-25" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_25 "id="siang-rak-25" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_25 "id="malam-rak-25" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala II
                                </td>  
                                <td> 
                                    <input type="checkbox" name="PkII_rak "id="PkII-rak" value="1"class="mr-1">
                                    Ajarkan cara meneran dengan baik dan benar
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_26 "id="pagi-rak-26" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_26 "id="siang-rak-26" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_26 "id="malam-rak-26" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rpm_rak "id="Rpm-rak" value="1"class="mr-1">  Risiko partus macet
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Pmjah_rak "id="Pmjah-rak" value="1"class="mr-1">
                                    Pimpin meneran jika ada his
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_27 "id="pagi-rak-27" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_27 "id="siang-rak-27" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_27 "id="malam-rak-27" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Raj_rak "id="Raj-rak" value="1"class="mr-1">  Risiko asfiksia janin
                                </td>  
                                <td> 
                                    <input type="checkbox" name="oDsm_rak "id="oDsm-rak" value="1"class="mr-1">
                                    Observasi DJJ setiap 10 menit/setelah ibu meneran
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_28 "id="pagi-rak-28" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_28 "id="siang-rak-28" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_28 "id="malam-rak-28" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Pk_rak "id="Pk-rak" value="1"class="mr-1">
                                    Pecahkan ketuban
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_29 "id="pagi-rak-29" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_29 "id="siang-rak-29" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_29 "id="malam-rak-29" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lebp_rak "id="Lebp-rak" value="1"class="mr-1">
                                    Lakukan episiotomi bila perlu
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_30 "id="pagi-rak-30" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_30 "id="siang-rak-30" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_30 "id="malam-rak-30" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lb_rak "id="Lb-rak" value="1"class="mr-1">
                                    Lahirkan bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_31 "id="pagi-rak-31" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_31 "id="siang-rak-31" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_31 "id="malam-rak-31" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lbdpi_rak "id="Lbdpi-rak" value="1"class="mr-1">
                                    Letakan bayi diatas perut ibu, dengan posisi kepala lebih rendah
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_32 "id="pagi-rak-32" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_32 "id="siang-rak-32" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_32 "id="malam-rak-32" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Bjnb_rak "id="Bjnb-rak" value="1"class="mr-1">
                                    Bersihkan jalan nafas bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_33 "id="pagi-rak-33" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_33 "id="siang-rak-33" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_33 "id="malam-rak-33" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kbslr_rak "id="Kbslr-rak" value="1"class="mr-1">
                                    Keringkan bayi sambil lakukan rangsang taktil dengan kain/selimut diatas perut ibu
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_34 "id="pagi-rak-34" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_34 "id="siang-rak-34" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_34 "id="malam-rak-34" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Gkyb_rak "id="Gkyb-rak" value="1"class="mr-1">
                                    Ganti kain yang basah, dan pastikan kepala bayi tertutup dengan baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_35 "id="pagi-rak-35" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_35 "id="siang-rak-35" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_35 "id="malam-rak-35" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Nsabm_rak "id="Nsabm-rak" value="1"class="mr-1">
                                    Nilai sekilas apakah bayi menangis kuat, dan tonus otot baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_36 "id="pagi-rak-36" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_36 "id="siang-rak-36" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_36 "id="malam-rak-36" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Cjk_rak "id="Cjk-rak" value="1"class="mr-1">
                                    Cek janin kedua
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_37 "id="pagi-rak-37" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_37 "id="siang-rak-37" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_37 "id="malam-rak-37" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaakp_rak "id="Kddaakp-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_38 "id="pagi-rak-38" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_38 "id="siang-rak-38" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_38 "id="malam-rak-38" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 4 </b> </td>
                                <td> 
                                    P <input type="text" name="p2_rak" id="p2-rak"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="a2_rak" id="a2-rak"class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ls1_rak "id="ls1-rak" value="1"class="mr-1">
                                    Lakukan segera (1 menit pertama setelah bayi lahir) penyuntikan Oksitosin 10 iu secara IM di 1/3 bagian atas paha bagian luar.   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_39 "id="pagi-rak-39" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_39 "id="siang-rak-39" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_39 "id="malam-rak-39" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala III
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Jdptp_rak "id="Jdptp-rak" value="1"class="mr-1">
                                    Jepit dan potong tali pusat (2 menit setelah bayi lahir) 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_40 "id="pagi-rak-40" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_40 "id="siang-rak-40" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_40 "id="malam-rak-40" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rrp_rak "id="Rrp-rak" value="1"class="mr-1">  Resiko retensio plasenta
                                </td>  
                                <td> 
                                    <input type="checkbox" name="FbuI_rak "id="FbuI-rak" value="1"class="mr-1">
                                    Fasilitasi bayi untuk IMD dan perhatikan kehangatan bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_41 "id="pagi-rak-41" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_41 "id="siang-rak-41" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_41 "id="malam-rak-41" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Bidpp_rak "id="Bidpp-rak" value="1"class="mr-1">
                                    Beritahu ibu dan pendamping persalinan untuk ikut mengawasi bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_42 "id="pagi-rak-42" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_42 "id="siang-rak-42" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_42 "id="malam-rak-42" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lptpt_rak "id="Lptpt-rak" value="1"class="mr-1">
                                    Lakukan peregangan tali pusat terkendali
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_43 "id="pagi-rak-43" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_43 "id="siang-rak-43" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_43 "id="malam-rak-43" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="llp_rak "id="llp-rak" value="1"class="mr-1">
                                    Lahirkan plasenta
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_44 "id="pagi-rak-44" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_44 "id="siang-rak-44" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_44 "id="malam-rak-44" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Mum_rak "id="Mum-rak" value="1"class="mr-1">
                                    Masase'uterus minimal 15 detik, pastikan kontraksi baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_45" id="pagi-rak-45" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_45" id="siang-rak-45" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_45" id="malam-rak-45" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Pjl_rak "id="Pjl-rak" value="1"class="mr-1">
                                    Periksa jalan lahir dan perkirakan darah yang keluar
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_46 "id="pagi-rak-46" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_46 "id="siang-rak-46" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_46 "id="malam-rak-46" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Nkp_rak "id="Nkp-rak" value="1"class="mr-1">
                                    Nilai kelengkapan plasenta
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_47 "id="pagi-rak-47" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_47 "id="siang-rak-47" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_47 "id="malam-rak-47" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaakpy_rak "id="Kddaakpy-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_48 "id="pagi-rak-48" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_48 "id="siang-rak-48" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_48 "id="malam-rak-48" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>
                            
                            <tr>
                                <td class="center"> <b> 5 </b> </td>
                                <td> 
                                    P <input type="text" name="PP3_rak" id="PP3-rak" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="AA3_rak" id="AA3-rak" class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Lbttv_rak "id="Lbttv-rak" value="1"class="mr-1">
                                    Lakukan observasi tanda-tanda vital  
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_49 "id="pagi-rak-49" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_49 "id="siang-rak-49" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_49 "id="malam-rak-49" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala IV
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Pjll_rak "id="Pjll-rak" value="1"class="mr-1">
                                    Periksa jalan lahir, lakukan tindakan aseptik pada daerah perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_50 "id="pagi-rak-50" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_50 "id="siang-rak-50" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_50 "id="malam-rak-50" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="RP_rak "id="RP-rak" value="1"class="mr-1">  Resiko Perdarahan
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Gal_rak "id="Gal-rak" value="1"class="mr-1">
                                    Gunakan anastesi lokal pada perineum yang akan di jahit
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_51 "id="pagi-rak-51" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_51 "id="siang-rak-51" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_51 "id="malam-rak-51" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Kee_rak "id="Kee-rak" value="1"class="mr-1">  Kebutuhan edukasi
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Lhp_rak "id="Lhp-rak" value="1"class="mr-1">
                                    Lakukan hecting perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_52 "id="pagi-rak-52" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_52 "id="siang-rak-52" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_52 "id="malam-rak-52" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kbpdp_rak "id="Kbpdp-rak" value="1"class="mr-1">
                                    Kompres betadine pada daerah perineum yang di hecting
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_53 "id="pagi-rak-53" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_53 "id="siang-rak-53" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_53 "id="malam-rak-53" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Ottv_rak "id="Ottv-rak" value="1"class="mr-1">
                                    Observasi tanda-tanda vital, kontraksi uterus, dan perdarahan post partum sesuai partograf
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_54 "id="pagi-rak-54" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_54 "id="siang-rak-54" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_54 "id="malam-rak-54" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Aium_rak "id="Aium-rak" value="1"class="mr-1">
                                    Ajarkan ibu untuk memeriksa dan melakukan massage pada rahim
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_55 "id="pagi-rak-55" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_55 "id="siang-rak-55" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_55 "id="malam-rak-55" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Becpjp_rak "id="Becpjp-rak" value="1"class="mr-1">
                                    Berikan edukasi cara perawatan jahitan perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_56 "id="pagi-rak-56" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_56 "id="siang-rak-56" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_56 "id="malam-rak-56" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Betbpp_rak "id="Betbpp-rak" value="1"class="mr-1">
                                    Berikan edukasi tanda bahaya post partum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_57 "id="pagi-rak-57" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_57 "id="siang-rak-57" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_57 "id="malam-rak-57" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="PkRr_rak "id="PkRr-rak" value="1"class="mr-1">
                                    Pindahkan ke ruang rawat kebidanan jika dalam 2 jam observasi kala IV tidak ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_58 "id="pagi-rak-58" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_58 "id="siang-rak-58" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_58 "id="malam-rak-58" value="1"class="mr-1" disabled> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaa_rak "id="Kddaa-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_59 "id="pagi-rak-59" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_59 "id="siang-rak-59" value="1"class="mr-1" disabled> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_59 "id="malam-rak-59" value="1"class="mr-1" disabled> 

                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Lain - lain  <textarea name="lain_rak" id="lain-rak" rows="2" class="form-control clear-input" placeholder=""></textarea>                                                                
                                </td>  
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <br>
                            <tr>
                                <td colspan="6">
                                    <button type="button" title="Tambah Rencana Asuhan Kebidanan" class="btn btn-info" onclick="tambahRencanaAsuhanKebidanan()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Rencana Asuhan Kebidanan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH RENCANA ASUHAN KEBIDANAN* TERLEBIH DAHULU..!!!</span></p>
                                </td>
                            </tr>
                        </tbody>                      
                    </table> 
                    `;
            html += tutupRapet();
            $('#buka-tutup-rak').append(html);
        }

        function showRencanaAAsuhankebidanan(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {

            function formatTanggalKhusus(waktu) {
                var el = waktu.split('-');
                var tahun = el[0];
                var bulan = el[1];
                var hari = el[2];
                return hari + '/' + bulan + '/' + tahun;
            }

            $('#tabel-rak .body-table').empty();
            if (data !== null) {
                $.each(data, function(i, v) {
                    let btnAksesLihat = '';
                    if (action != 'lihat') {
                        btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editRencanaAsuhanKebidanan(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusRencanaAsuhanKebidanan(this, ' +
                        v.id +
                        ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                    }
                    const selOp =
                    '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatRencanaAsuhanKebidanan(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                    btnAksesLihat + 
                    '</td>';

                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>
                            <td align="center">` + ((v.tanggal_rak !== null) ? formatTanggalKhusus(v.tanggal_rak) : '') + `</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                        </tr>
                    `;
                    $('#tabel-rak tbody').append(html);
                    numberRAK = i;
                })
            }
        }
     
        function konfirmasiSimpanRencanaAsuhanKebidanan() {

            if ($('#tanggal-rak').val() === '') {
                syams_validation('#tanggal-rak', 'Tanggal harus diisi.');
                return false;
            } else {
                syams_validation_remove('#tanggal-rak');
            }

            swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin akan menyimpan datan ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanRencanaAsuhanKebidanan();
                }
            })
        }

        function simpanRencanaAsuhanKebidanan() {
            var id_layanan_pendaftaran_rak = $('#id-layanan-pendaftaran-rak').val(); 
            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_rencana_asuhan_kebidanan") ?>',
                data: $('#form_rencana_asuhan_keb').serialize() + '&id-layanan-pendaftaran-rak=' + id_layanan_pendaftaran_rak,

                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (data.respon !== null) {
                        if (data.respon.show !== null) {
                            if (data.respon.status === false) {
                                bootbox.dialog({
                                    message: data.respon.message,
                                    title: "Penyimpanan Data Gagal",
                                    buttons: {
                                        batal: {
                                            label: '<i class=" fas fa-times-circle"></i> Close',
                                            className: "btn-danger",
                                            callback: function() {
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    } else {
                        $('input[name=csrf_syam]').val(data.token);
                        if (data.status) {
                            messageAddSuccess();
                            $('#modal_rencana_asuhan_keb').modal('hide');
                            showListForm($('#id-pendaftaran-rak').val(), $('#id-layanan-pendaftaran-rak').val(), $('#id-pasien-rak').val());
                        } else {
                            messageAddFailed();
                        }
                    }
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageAddFailed();
                }
            });
        }
        
        function resetFormRencanaAsuhanKebidanan() {
            $('#form_rencana_asuhan_keb')[0].reset();
            $("input[type='checkbox']").prop('checked',false);
            $("input[type='radio']").prop('checked',false);
            $('#buka-tutup-rak').empty();
        }

        // LIHAT
        function lihatRencanaAsuhanKebidanan(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            $('#modal-edit-rencana-asuhan-kebidanan-104-00').modal('show');
            // $('#update-rak').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_edit_rencana_asuhan_kebidanan") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-rak').empty();
                    $('#id-rencana-asuhan-kebidanan-104-00').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }

                    let edit_tanggal_rak = formatTanggalKhusus(data.tanggal_rak);
                    $('#edit-tanggal-rak').val(edit_tanggal_rak);

                    let cttntndkn = '';
                    cttntndkn =
                        `   <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-rencana-asuhan-kebidanan-104-00').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                        `;
                    $('#update-rak').append(cttntndkn);
                  
                    // Set nilai input
                    $('#edit-g-rak-1').val(data.g_rak_1);
                    $('#edit-p-rak-1').val(data.p_rak_1);
                    $('#edit-a-rak-1').val(data.a_rak_1);
                    data.losp_rak == '1' ? $('#edit-losp-rak').prop('checked', true) : $('#edit-losp-rak').prop('checked', false);
                    data.pagi_rak_1 == '1' ? $('#edit-pagi-rak-1').prop('checked', true) : $('#edit-pagi-rak-1').prop('checked', false);
                    data.siang_rak_1 == '1' ? $('#edit-siang-rak-1').prop('checked', true) : $('#edit-siang-rak-1').prop('checked', false);
                    data.malam_rak_1 == '1' ? $('#edit-malam-rak-1').prop('checked', true) : $('#edit-malam-rak-1').prop('checked', false);

                    $('#edit-hm-rak-1').val(data.hm_rak_1);
                    data.ds3m_rak == '1' ? $('#edit-ds3m-rak').prop('checked', true) : $('#edit-ds3m-rak').prop('checked', false);
                    data.pagi_rak_2 == '1' ? $('#edit-pagi-rak-2').prop('checked', true) : $('#edit-pagi-rak-2').prop('checked', false);
                    data.siang_rak_2 == '1' ? $('#edit-siang-rak-2').prop('checked', true) : $('#edit-siang-rak-2').prop('checked', false);
                    data.malam_rak_2 == '1' ? $('#edit-malam-rak-2').prop('checked', true) : $('#edit-malam-rak-2').prop('checked', false);

                    data.pkI_rak == '1' ? $('#edit-pkI-rak').prop('checked', true) : $('#edit-pkI-rak').prop('checked', false);
                    data.hks3m_rak == '1' ? $('#edit-hks3m-rak').prop('checked', true) : $('#edit-hks3m-rak').prop('checked', false);
                    data.pagi_rak_3 == '1' ? $('#edit-pagi-rak-3').prop('checked', true) : $('#edit-pagi-rak-3').prop('checked', false);
                    data.siang_rak_3 == '1' ? $('#edit-siang-rak-3').prop('checked', true) : $('#edit-siang-rak-3').prop('checked', false);
                    data.malam_rak_3 == '1' ? $('#edit-malam-rak-3').prop('checked', true) : $('#edit-malam-rak-3').prop('checked', false);

                    data.bI_rak == '1' ? $('#edit-bI-rak').prop('checked', true) : $('#edit-bI-rak').prop('checked', false);
                    data.ns3m_rak == '1' ? $('#edit-ns3m-rak').prop('checked', true) : $('#edit-ns3m-rak').prop('checked', false);
                    data.pagi_rak_4 == '1' ? $('#edit-pagi-rak-4').prop('checked', true) : $('#edit-pagi-rak-4').prop('checked', false);
                    data.siang_rak_4 == '1' ? $('#edit-siang-rak-4').prop('checked', true) : $('#edit-siang-rak-4').prop('checked', false);
                    data.malam_rak_4 == '1' ? $('#edit-malam-rak-4').prop('checked', true) : $('#edit-malam-rak-4').prop('checked', false);

                    data.rptm_rak == '1' ? $('#edit-rptm-rak').prop('checked', true) : $('#edit-rptm-rak').prop('checked', false);
                    data.pss4j_rak == '1' ? $('#edit-pss4j-rak').prop('checked', true) : $('#edit-pss4j-rak').prop('checked', false);
                    data.pagi_rak_5 == '1' ? $('#edit-pagi-rak-5').prop('checked', true) : $('#edit-pagi-rak-5').prop('checked', false);
                    data.siang_rak_5 == '1' ? $('#edit-siang-rak-5').prop('checked', true) : $('#edit-siang-rak-5').prop('checked', false);
                    data.malam_rak_5 == '1' ? $('#edit-malam-rak-5').prop('checked', true) : $('#edit-malam-rak-5').prop('checked', false);

                    data.cemas_rak == '1' ? $('#edit-cemas-rak').prop('checked', true) : $('#edit-cemas-rak').prop('checked', false);
                    data.tddss4j_rak == '1' ? $('#edit-tddss4j-rak').prop('checked', true) : $('#edit-tddss4j-rak').prop('checked', false);
                    data.pagi_rak_6 == '1' ? $('#edit-pagi-rak-6').prop('checked', true) : $('#edit-pagi-rak-6').prop('checked', false);
                    data.siang_rak_6 == '1' ? $('#edit-siang-rak-6').prop('checked', true) : $('#edit-siang-rak-6').prop('checked', false);
                    data.malam_rak_6 == '1' ? $('#edit-malam-rak-6').prop('checked', true) : $('#edit-malam-rak-6').prop('checked', false);

                    data.N_rak == '1' ? $('#edit-N-rak').prop('checked', true) : $('#edit-N-rak').prop('checked', false);
                    data.pus24j_rak == '1' ? $('#edit-pus24j-rak').prop('checked', true) : $('#edit-pus24j-rak').prop('checked', false);
                    data.pagi_rak_7 == '1' ? $('#edit-pagi-rak-7').prop('checked', true) : $('#edit-pagi-rak-7').prop('checked', false);
                    data.siang_rak_7 == '1' ? $('#edit-siang-rak-7').prop('checked', true) : $('#edit-siang-rak-7').prop('checked', false);
                    data.malam_rak_7 == '1' ? $('#edit-malam-rak-7').prop('checked', true) : $('#edit-malam-rak-7').prop('checked', false);


                    data.ke_rak == '1' ? $('#edit-ke-rak').prop('checked', true) : $('#edit-ke-rak').prop('checked', false);
                    data.fiumpp_rak == '1' ? $('#edit-fiumpp-rak').prop('checked', true) : $('#edit-fiumpp-rak').prop('checked', false);
                    data.pagi_rak_8 == '1' ? $('#edit-pagi-rak-8').prop('checked', true) : $('#edit-pagi-rak-8').prop('checked', false);
                    data.siang_rak_8 == '1' ? $('#edit-siang-rak-8').prop('checked', true) : $('#edit-siang-rak-8').prop('checked', false);
                    data.malam_rak_8 == '1' ? $('#edit-malam-rak-8').prop('checked', true) : $('#edit-malam-rak-8').prop('checked', false);

                    data.fiumdm_rak == '1' ? $('#edit-fiumdm-rak').prop('checked', true) : $('#edit-fiumdm-rak').prop('checked', false);
                    data.pagi_rak_9 == '1' ? $('#edit-pagi-rak-9').prop('checked', true) : $('#edit-pagi-rak-9').prop('checked', false);
                    data.siang_rak_9 == '1' ? $('#edit-siang-rak-9').prop('checked', true) : $('#edit-siang-rak-9').prop('checked', false);
                    data.malam_rak_9 == '1' ? $('#edit-malam-rak-9').prop('checked', true) : $('#edit-malam-rak-9').prop('checked', false);

                    data.fiub_rak == '1' ? $('#edit-fiub-rak').prop('checked', true) : $('#edit-fiub-rak').prop('checked', false);
                    data.pagi_rak_10 == '1' ? $('#edit-pagi-rak-10').prop('checked', true) : $('#edit-pagi-rak-10').prop('checked', false);
                    data.siang_rak_10 == '1' ? $('#edit-siang-rak-10').prop('checked', true) : $('#edit-siang-rak-10').prop('checked', false);
                    data.malam_rak_10 == '1' ? $('#edit-malam-rak-10').prop('checked', true) : $('#edit-malam-rak-10').prop('checked', false);

                    data.ajiumk_rak == '1' ? $('#edit-ajiumk-rak').prop('checked', true) : $('#edit-ajiumk-rak').prop('checked', false);
                    data.pagi_rak_11 == '1' ? $('#edit-pagi-rak-11').prop('checked', true) : $('#edit-pagi-rak-11').prop('checked', false);
                    data.siang_rak_11 == '1' ? $('#edit-siang-rak-11').prop('checked', true) : $('#edit-siang-rak-11').prop('checked', false);
                    data.malam_rak_11 == '1' ? $('#edit-malam-rak-11').prop('checked', true) : $('#edit-malam-rak-11').prop('checked', false);


                    data.atrumn_rak == '1' ? $('#edit-atrumn-rak').prop('checked', true) : $('#edit-atrumn-rak').prop('checked', false);
                    data.pagi_rak_12 == '1' ? $('#edit-pagi-rak-12').prop('checked', true) : $('#edit-pagi-rak-12').prop('checked', false);
                    data.siang_rak_12 == '1' ? $('#edit-siang-rak-12').prop('checked', true) : $('#edit-siang-rak-12').prop('checked', false);
                    data.malam_rak_12 == '1' ? $('#edit-malam-rak-12').prop('checked', true) : $('#edit-malam-rak-12').prop('checked', false);

                    data.lsppsh_rak == '1' ? $('#edit-lsppsh-rak').prop('checked', true) : $('#edit-lsppsh-rak').prop('checked', false);
                    data.pagi_rak_13 == '1' ? $('#edit-pagi-rak-13').prop('checked', true) : $('#edit-pagi-rak-13').prop('checked', false);
                    data.siang_rak_13 == '1' ? $('#edit-siang-rak-13').prop('checked', true) : $('#edit-siang-rak-13').prop('checked', false);
                    data.malam_rak_13 == '1' ? $('#edit-malam-rak-13').prop('checked', true) : $('#edit-malam-rak-13').prop('checked', false);

                    data.akumd_rak == '1' ? $('#edit-akumd-rak').prop('checked', true) : $('#edit-akumd-rak').prop('checked', false);
                    data.pagi_rak_14 == '1' ? $('#edit-pagi-rak-14').prop('checked', true) : $('#edit-pagi-rak-14').prop('checked', false);
                    data.siang_rak_14 == '1' ? $('#edit-siang-rak-14').prop('checked', true) : $('#edit-siang-rak-14').prop('checked', false);
                    data.malam_rak_14 == '1' ? $('#edit-malam-rak-14').prop('checked', true) : $('#edit-malam-rak-14').prop('checked', false);

                    data.bepdkk_rak == '1' ? $('#edit-bepdkk-rak').prop('checked', true) : $('#edit-bepdkk-rak').prop('checked', false);
                    data.pagi_rak_15 == '1' ? $('#edit-pagi-rak-15').prop('checked', true) : $('#edit-pagi-rak-15').prop('checked', false);
                    data.siang_rak_15 == '1' ? $('#edit-siang-rak-15').prop('checked', true) : $('#edit-siang-rak-15').prop('checked', false);
                    data.malam_rak_15 == '1' ? $('#edit-malam-rak-15').prop('checked', true) : $('#edit-malam-rak-15').prop('checked', false);

                    data.bepp_rak == '1' ? $('#edit-bepp-rak').prop('checked', true) : $('#edit-bepp-rak').prop('checked', false);
                    data.pagi_rak_16 == '1' ? $('#edit-pagi-rak-16').prop('checked', true) : $('#edit-pagi-rak-16').prop('checked', false);
                    data.siang_rak_16 == '1' ? $('#edit-siang-rak-16').prop('checked', true) : $('#edit-siang-rak-16').prop('checked', false);
                    data.malam_rak_16 == '1' ? $('#edit-malam-rak-16').prop('checked', true) : $('#edit-malam-rak-16').prop('checked', false);

                    data.BetI_rak == '1' ? $('#edit-BetI-rak').prop('checked', true) : $('#edit-BetI-rak').prop('checked', false);
                    data.pagi_rak_17 == '1' ? $('#edit-pagi-rak-17').prop('checked', true) : $('#edit-pagi-rak-17').prop('checked', false);
                    data.siang_rak_17 == '1' ? $('#edit-siang-rak-17').prop('checked', true) : $('#edit-siang-rak-17').prop('checked', false);
                    data.malam_rak_17 == '1' ? $('#edit-malam-rak-17').prop('checked', true) : $('#edit-malam-rak-17').prop('checked', false);

                    data.Saap_rak == '1' ? $('#edit-Saap-rak').prop('checked', true) : $('#edit-Saap-rak').prop('checked', false);
                    data.pagi_rak_18 == '1' ? $('#edit-pagi-rak-18').prop('checked', true) : $('#edit-pagi-rak-18').prop('checked', false);
                    data.siang_rak_18 == '1' ? $('#edit-siang-rak-18').prop('checked', true) : $('#edit-siang-rak-18').prop('checked', false);
                    data.malam_rak_18 == '1' ? $('#edit-malam-rak-18').prop('checked', true) : $('#edit-malam-rak-18').prop('checked', false);

                    data.Kddaadpt_rak == '1' ? $('#edit-Kddaadpt-rak').prop('checked', true) : $('#edit-Kddaadpt-rak').prop('checked', false);
                    data.pagi_rak_19 == '1' ? $('#edit-pagi-rak-19').prop('checked', true) : $('#edit-pagi-rak-19').prop('checked', false);
                    data.siang_rak_19 == '1' ? $('#edit-siang-rak-19').prop('checked', true) : $('#edit-siang-rak-19').prop('checked', false);
                    data.malam_rak_19 == '1' ? $('#edit-malam-rak-19').prop('checked', true) : $('#edit-malam-rak-19').prop('checked', false);

                    $('#edit-JP-rak').val(data.JP_rak);
                    data.LoDdkj_rak == '1' ? $('#edit-LoDdkj-rak').prop('checked', true) : $('#edit-LoDdkj-rak').prop('checked', false);
                    data.pagi_rak_20 == '1' ? $('#edit-pagi-rak-20').prop('checked', true) : $('#edit-pagi-rak-20').prop('checked', false);
                    data.siang_rak_20 == '1' ? $('#edit-siang-rak-20').prop('checked', true) : $('#edit-siang-rak-20').prop('checked', false);
                    data.malam_rak_20 == '1' ? $('#edit-malam-rak-20').prop('checked', true) : $('#edit-malam-rak-20').prop('checked', false);

                    data.TH_rak == '1' ? $('#edit-TH-rak').prop('checked', true) : $('#edit-TH-rak').prop('checked', false);
                    data.Logj_rak == '1' ? $('#edit-Logj-rak').prop('checked', true) : $('#edit-Logj-rak').prop('checked', false);
                    data.pagi_rak_21 == '1' ? $('#edit-pagi-rak-21').prop('checked', true) : $('#edit-pagi-rak-21').prop('checked', false);
                    data.siang_rak_21 == '1' ? $('#edit-siang-rak-21').prop('checked', true) : $('#edit-siang-rak-21').prop('checked', false);
                    data.malam_rak_21 == '1' ? $('#edit-malam-rak-21').prop('checked', true) : $('#edit-malam-rak-21').prop('checked', false);

                    data.kosong_rak == '1' ? $('#edit-kosong-rak').prop('checked', true) : $('#edit-kosong-rak').prop('checked', false);
                    $('#edit-kosoong-rak').val(data.kosoong_rak);
                    data.siapkan_rak == '1' ? $('#edit-siapkan-rak').prop('checked', true) : $('#edit-siapkan-rak').prop('checked', false);
                    data.pagi_rak_22 == '1' ? $('#edit-pagi-rak-22').prop('checked', true) : $('#edit-pagi-rak-22').prop('checked', false);
                    data.siang_rak_22 == '1' ? $('#edit-siang-rak-22').prop('checked', true) : $('#edit-siang-rak-22').prop('checked', false);
                    data.malam_rak_22 == '1' ? $('#edit-malam-rak-22').prop('checked', true) : $('#edit-malam-rak-22').prop('checked', false);

                    data.Rgj_rak == '1' ? $('#edit-Rgj-rak').prop('checked', true) : $('#edit-Rgj-rak').prop('checked', false);
                    data.Kddaadp_rak == '1' ? $('#edit-Kddaadp-rak').prop('checked', true) : $('#edit-Kddaadp-rak').prop('checked', false);
                    data.pagi_rak_23 == '1' ? $('#edit-pagi-rak-23').prop('checked', true) : $('#edit-pagi-rak-23').prop('checked', false);
                    data.siang_rak_23 == '1' ? $('#edit-siang-rak-23').prop('checked', true) : $('#edit-siang-rak-23').prop('checked', false);
                    data.malam_rak_23 == '1' ? $('#edit-malam-rak-23').prop('checked', true) : $('#edit-malam-rak-23').prop('checked', false);

                    $('#edit-GG-rak').val(data.GG_rak);
                    $('#edit-PP-rak').val(data.PP_rak);
                    $('#edit-AA-rak').val(data.AA_rak);
                    data.PtkII_rak == '1' ? $('#edit-PtkII-rak').prop('checked', true) : $('#edit-PtkII-rak').prop('checked', false);
                    data.pagi_rak_24 == '1' ? $('#edit-pagi-rak-24').prop('checked', true) : $('#edit-pagi-rak-24').prop('checked', false);
                    data.siang_rak_24 == '1' ? $('#edit-siang-rak-24').prop('checked', true) : $('#edit-siang-rak-24').prop('checked', false);
                    data.malam_rak_24 == '1' ? $('#edit-malam-rak-24').prop('checked', true) : $('#edit-malam-rak-24').prop('checked', false);

                    $('#edit-Hmm-rak').val(data.Hmm_rak);
                    data.Api_rak == '1' ? $('#edit-Api-rak').prop('checked', true) : $('#edit-Api-rak').prop('checked', false);
                    data.pagi_rak_25 == '1' ? $('#edit-pagi-rak-25').prop('checked', true) : $('#edit-pagi-rak-25').prop('checked', false);
                    data.siang_rak_25 == '1' ? $('#edit-siang-rak-25').prop('checked', true) : $('#edit-siang-rak-25').prop('checked', false);
                    data.malam_rak_25 == '1' ? $('#edit-malam-rak-25').prop('checked', true) : $('#edit-malam-rak-25').prop('checked', false);

                    data.PkII_rak == '1' ? $('#edit-PkII-rak').prop('checked', true) : $('#edit-PkII-rak').prop('checked', false);
                    data.pagi_rak_26 == '1' ? $('#edit-pagi-rak-26').prop('checked', true) : $('#edit-pagi-rak-26').prop('checked', false);
                    data.siang_rak_26 == '1' ? $('#edit-siang-rak-26').prop('checked', true) : $('#edit-siang-rak-26').prop('checked', false);
                    data.malam_rak_26 == '1' ? $('#edit-malam-rak-26').prop('checked', true) : $('#edit-malam-rak-26').prop('checked', false);


                    data.Rpm_rak == '1' ? $('#edit-Rpm-rak').prop('checked', true) : $('#edit-Rpm-rak').prop('checked', false);
                    data.Pmjah_rak == '1' ? $('#edit-Pmjah-rak').prop('checked', true) : $('#edit-Pmjah-rak').prop('checked', false);
                    data.pagi_rak_27 == '1' ? $('#edit-pagi-rak-27').prop('checked', true) : $('#edit-pagi-rak-27').prop('checked', false);
                    data.siang_rak_27 == '1' ? $('#edit-siang-rak-27').prop('checked', true) : $('#edit-siang-rak-27').prop('checked', false);
                    data.malam_rak_27 == '1' ? $('#edit-malam-rak-27').prop('checked', true) : $('#edit-malam-rak-27').prop('checked', false);

                    data.Raj_rak == '1' ? $('#edit-Raj-rak').prop('checked', true) : $('#edit-Raj-rak').prop('checked', false);
                    data.oDsm_rak == '1' ? $('#edit-oDsm-rak').prop('checked', true) : $('#edit-oDsm-rak').prop('checked', false);
                    data.pagi_rak_28 == '1' ? $('#edit-pagi-rak-28').prop('checked', true) : $('#edit-pagi-rak-28').prop('checked', false);
                    data.siang_rak_28 == '1' ? $('#edit-siang-rak-28').prop('checked', true) : $('#edit-siang-rak-28').prop('checked', false);
                    data.malam_rak_28 == '1' ? $('#edit-malam-rak-28').prop('checked', true) : $('#edit-malam-rak-28').prop('checked', false);

                    data.Pk_rak == '1' ? $('#edit-Pk-rak').prop('checked', true) : $('#edit-Pk-rak').prop('checked', false);
                    data.pagi_rak_29 == '1' ? $('#edit-pagi-rak-29').prop('checked', true) : $('#edit-pagi-rak-29').prop('checked', false);
                    data.siang_rak_29 == '1' ? $('#edit-siang-rak-29').prop('checked', true) : $('#edit-siang-rak-29').prop('checked', false);
                    data.malam_rak_29 == '1' ? $('#edit-malam-rak-29').prop('checked', true) : $('#edit-malam-rak-29').prop('checked', false);

                    data.Lebp_rak == '1' ? $('#edit-Lebp-rak').prop('checked', true) : $('#edit-Lebp-rak').prop('checked', false);
                    data.pagi_rak_30 == '1' ? $('#edit-pagi-rak-30').prop('checked', true) : $('#edit-pagi-rak-30').prop('checked', false);
                    data.siang_rak_30 == '1' ? $('#edit-siang-rak-30').prop('checked', true) : $('#edit-siang-rak-30').prop('checked', false);
                    data.malam_rak_30 == '1' ? $('#edit-malam-rak-30').prop('checked', true) : $('#edit-malam-rak-30').prop('checked', false);

                    data.Lb_rak == '1' ? $('#edit-Lb-rak').prop('checked', true) : $('#edit-Lb-rak').prop('checked', false);
                    data.pagi_rak_31 == '1' ? $('#edit-pagi-rak-31').prop('checked', true) : $('#edit-pagi-rak-31').prop('checked', false);
                    data.siang_rak_31 == '1' ? $('#edit-siang-rak-31').prop('checked', true) : $('#edit-siang-rak-31').prop('checked', false);
                    data.malam_rak_31 == '1' ? $('#edit-malam-rak-31').prop('checked', true) : $('#edit-malam-rak-31').prop('checked', false);

                    data.Lbdpi_rak == '1' ? $('#edit-Lbdpi-rak').prop('checked', true) : $('#edit-Lbdpi-rak').prop('checked', false);
                    data.pagi_rak_32 == '1' ? $('#edit-pagi-rak-32').prop('checked', true) : $('#edit-pagi-rak-32').prop('checked', false);
                    data.siang_rak_32 == '1' ? $('#edit-siang-rak-32').prop('checked', true) : $('#edit-siang-rak-32').prop('checked', false);
                    data.malam_rak_32 == '1' ? $('#edit-malam-rak-32').prop('checked', true) : $('#edit-malam-rak-32').prop('checked', false);

                    data.Bjnb_rak == '1' ? $('#edit-Bjnb-rak').prop('checked', true) : $('#edit-Bjnb-rak').prop('checked', false);
                    data.pagi_rak_33 == '1' ? $('#edit-pagi-rak-33').prop('checked', true) : $('#edit-pagi-rak-33').prop('checked', false);
                    data.siang_rak_33 == '1' ? $('#edit-siang-rak-33').prop('checked', true) : $('#edit-siang-rak-33').prop('checked', false);
                    data.malam_rak_33 == '1' ? $('#edit-malam-rak-33').prop('checked', true) : $('#edit-malam-rak-33').prop('checked', false);

                    data.Kbslr_rak == '1' ? $('#edit-Kbslr-rak').prop('checked', true) : $('#edit-Kbslr-rak').prop('checked', false);
                    data.pagi_rak_34 == '1' ? $('#edit-pagi-rak-34').prop('checked', true) : $('#edit-pagi-rak-34').prop('checked', false);
                    data.siang_rak_34 == '1' ? $('#edit-siang-rak-34').prop('checked', true) : $('#edit-siang-rak-34').prop('checked', false);
                    data.malam_rak_34 == '1' ? $('#edit-malam-rak-34').prop('checked', true) : $('#edit-malam-rak-34').prop('checked', false);

                    data.Gkyb_rak == '1' ? $('#edit-Gkyb-rak').prop('checked', true) : $('#edit-Gkyb-rak').prop('checked', false);
                    data.pagi_rak_35 == '1' ? $('#edit-pagi-rak-35').prop('checked', true) : $('#edit-pagi-rak-35').prop('checked', false);
                    data.siang_rak_35 == '1' ? $('#edit-siang-rak-35').prop('checked', true) : $('#edit-siang-rak-35').prop('checked', false);
                    data.malam_rak_35 == '1' ? $('#edit-malam-rak-35').prop('checked', true) : $('#edit-malam-rak-35').prop('checked', false);

                    data.Nsabm_rak == '1' ? $('#edit-Nsabm-rak').prop('checked', true) : $('#edit-Nsabm-rak').prop('checked', false);
                    data.pagi_rak_36 == '1' ? $('#edit-pagi-rak-36').prop('checked', true) : $('#edit-pagi-rak-36').prop('checked', false);
                    data.siang_rak_36 == '1' ? $('#edit-siang-rak-36').prop('checked', true) : $('#edit-siang-rak-36').prop('checked', false);
                    data.malam_rak_36 == '1' ? $('#edit-malam-rak-36').prop('checked', true) : $('#edit-malam-rak-36').prop('checked', false);

                    data.Cjk_rak == '1' ? $('#edit-Cjk-rak').prop('checked', true) : $('#edit-Cjk-rak').prop('checked', false);
                    data.pagi_rak_37 == '1' ? $('#edit-pagi-rak-37').prop('checked', true) : $('#edit-pagi-rak-37').prop('checked', false);
                    data.siang_rak_37 == '1' ? $('#edit-siang-rak-37').prop('checked', true) : $('#edit-siang-rak-37').prop('checked', false);
                    data.malam_rak_37 == '1' ? $('#edit-malam-rak-37').prop('checked', true) : $('#edit-malam-rak-37').prop('checked', false);

                    data.Kddaakp_rak == '1' ? $('#edit-Kddaakp-rak').prop('checked', true) : $('#edit-Kddaakp-rak').prop('checked', false);
                    data.pagi_rak_38 == '1' ? $('#edit-pagi-rak-38').prop('checked', true) : $('#edit-pagi-rak-38').prop('checked', false);
                    data.siang_rak_38 == '1' ? $('#edit-siang-rak-38').prop('checked', true) : $('#edit-siang-rak-38').prop('checked', false);
                    data.malam_rak_38 == '1' ? $('#edit-malam-rak-38').prop('checked', true) : $('#edit-malam-rak-38').prop('checked', false);

                    $('#edit-p2-rak').val(data.p2_rak);
                    $('#edit-a2-rak').val(data.a2_rak);
                    data.ls1_rak == '1' ? $('#edit-ls1-rak').prop('checked', true) : $('#edit-ls1-rak').prop('checked', false);
                    data.pagi_rak_39 == '1' ? $('#edit-pagi-rak-39').prop('checked', true) : $('#edit-pagi-rak-39').prop('checked', false);
                    data.siang_rak_39 == '1' ? $('#edit-siang-rak-39').prop('checked', true) : $('#edit-siang-rak-39').prop('checked', false);
                    data.malam_rak_39 == '1' ? $('#edit-malam-rak-39').prop('checked', true) : $('#edit-malam-rak-39').prop('checked', false);

                    data.Jdptp_rak == '1' ? $('#edit-Jdptp-rak').prop('checked', true) : $('#edit-Jdptp-rak').prop('checked', false);
                    data.pagi_rak_40 == '1' ? $('#edit-pagi-rak-40').prop('checked', true) : $('#edit-pagi-rak-40').prop('checked', false);
                    data.siang_rak_40 == '1' ? $('#edit-siang-rak-40').prop('checked', true) : $('#edit-siang-rak-40').prop('checked', false);
                    data.malam_rak_40 == '1' ? $('#edit-malam-rak-40').prop('checked', true) : $('#edit-malam-rak-40').prop('checked', false);

                    data.Rrp_rak == '1' ? $('#edit-Rrp-rak').prop('checked', true) : $('#edit-Rrp-rak').prop('checked', false);
                    data.FbuI_rak == '1' ? $('#edit-FbuI-rak').prop('checked', true) : $('#edit-FbuI-rak').prop('checked', false);
                    data.pagi_rak_41 == '1' ? $('#edit-pagi-rak-41').prop('checked', true) : $('#edit-pagi-rak-41').prop('checked', false);
                    data.siang_rak_41 == '1' ? $('#edit-siang-rak-41').prop('checked', true) : $('#edit-siang-rak-41').prop('checked', false);
                    data.malam_rak_41 == '1' ? $('#edit-malam-rak-41').prop('checked', true) : $('#edit-malam-rak-41').prop('checked', false);

                    data.Bidpp_rak == '1' ? $('#edit-Bidpp-rak').prop('checked', true) : $('#edit-Bidpp-rak').prop('checked', false);
                    data.pagi_rak_42 == '1' ? $('#edit-pagi-rak-42').prop('checked', true) : $('#edit-pagi-rak-42').prop('checked', false);
                    data.siang_rak_42 == '1' ? $('#edit-siang-rak-42').prop('checked', true) : $('#edit-siang-rak-42').prop('checked', false);
                    data.malam_rak_42 == '1' ? $('#edit-malam-rak-42').prop('checked', true) : $('#edit-malam-rak-42').prop('checked', false);

                    data.Lptpt_rak == '1' ? $('#edit-Lptpt-rak').prop('checked', true) : $('#edit-Lptpt-rak').prop('checked', false);
                    data.pagi_rak_43 == '1' ? $('#edit-pagi-rak-43').prop('checked', true) : $('#edit-pagi-rak-43').prop('checked', false);
                    data.siang_rak_43 == '1' ? $('#edit-siang-rak-43').prop('checked', true) : $('#edit-siang-rak-43').prop('checked', false);
                    data.malam_rak_43 == '1' ? $('#edit-malam-rak-43').prop('checked', true) : $('#edit-malam-rak-43').prop('checked', false);

                    data.llp_rak == '1' ? $('#edit-llp-rak').prop('checked', true) : $('#edit-llp-rak').prop('checked', false);
                    data.pagi_rak_44 == '1' ? $('#edit-pagi-rak-44').prop('checked', true) : $('#edit-pagi-rak-44').prop('checked', false);
                    data.siang_rak_44 == '1' ? $('#edit-siang-rak-44').prop('checked', true) : $('#edit-siang-rak-44').prop('checked', false);
                    data.malam_rak_44 == '1' ? $('#edit-malam-rak-44').prop('checked', true) : $('#edit-malam-rak-44').prop('checked', false);

                    data.Mum_rak == '1' ? $('#edit-Mum-rak').prop('checked', true) : $('#edit-Mum-rak').prop('checked', false);
                    data.pagi_rak_45 == '1' ? $('#edit-pagi-rak-45').prop('checked', true) : $('#edit-pagi-rak-45').prop('checked', false);
                    data.siang_rak_45 == '1' ? $('#edit-siang-rak-45').prop('checked', true) : $('#edit-siang-rak-45').prop('checked', false);
                    data.malam_rak_45 == '1' ? $('#edit-malam-rak-45').prop('checked', true) : $('#edit-malam-rak-45').prop('checked', false);

                    data.Pjl_rak == '1' ? $('#edit-Pjl-rak').prop('checked', true) : $('#edit-Pjl-rak').prop('checked', false);
                    data.pagi_rak_46 == '1' ? $('#edit-pagi-rak-46').prop('checked', true) : $('#edit-pagi-rak-46').prop('checked', false);
                    data.siang_rak_46 == '1' ? $('#edit-siang-rak-46').prop('checked', true) : $('#edit-siang-rak-46').prop('checked', false);
                    data.malam_rak_46 == '1' ? $('#edit-malam-rak-46').prop('checked', true) : $('#edit-malam-rak-46').prop('checked', false);

                    data.Nkp_rak == '1' ? $('#edit-Nkp-rak').prop('checked', true) : $('#edit-Nkp-rak').prop('checked', false);
                    data.pagi_rak_47 == '1' ? $('#edit-pagi-rak-47').prop('checked', true) : $('#edit-pagi-rak-47').prop('checked', false);
                    data.siang_rak_47 == '1' ? $('#edit-siang-rak-47').prop('checked', true) : $('#edit-siang-rak-47').prop('checked', false);
                    data.malam_rak_47 == '1' ? $('#edit-malam-rak-47').prop('checked', true) : $('#edit-malam-rak-47').prop('checked', false);

                    data.Kddaakpy_rak == '1' ? $('#edit-Kddaakpy-rak').prop('checked', true) : $('#edit-Kddaakpy-rak').prop('checked', false);
                    data.pagi_rak_48 == '1' ? $('#edit-pagi-rak-48').prop('checked', true) : $('#edit-pagi-rak-48').prop('checked', false);
                    data.siang_rak_48 == '1' ? $('#edit-siang-rak-48').prop('checked', true) : $('#edit-siang-rak-48').prop('checked', false);
                    data.malam_rak_48 == '1' ? $('#edit-malam-rak-48').prop('checked', true) : $('#edit-malam-rak-48').prop('checked', false);

                    $('#edit-PP3-rak').val(data.PP3_rak);
                    $('#edit-AA3-rak').val(data.AA3_rak);
                    data.Lbttv_rak == '1' ? $('#edit-Lbttv-rak').prop('checked', true) : $('#edit-Lbttv-rak').prop('checked', false);
                    data.pagi_rak_49 == '1' ? $('#edit-pagi-rak-49').prop('checked', true) : $('#edit-pagi-rak-49').prop('checked', false);
                    data.siang_rak_49 == '1' ? $('#edit-siang-rak-49').prop('checked', true) : $('#edit-siang-rak-49').prop('checked', false);
                    data.malam_rak_49 == '1' ? $('#edit-malam-rak-49').prop('checked', true) : $('#edit-malam-rak-49').prop('checked', false);

                    data.Pjll_rak == '1' ? $('#edit-Pjll-rak').prop('checked', true) : $('#edit-Pjll-rak').prop('checked', false);
                    data.pagi_rak_50 == '1' ? $('#edit-pagi-rak-50').prop('checked', true) : $('#edit-pagi-rak-50').prop('checked', false);
                    data.siang_rak_50 == '1' ? $('#edit-siang-rak-50').prop('checked', true) : $('#edit-siang-rak-50').prop('checked', false);
                    data.malam_rak_50 == '1' ? $('#edit-malam-rak-50').prop('checked', true) : $('#edit-malam-rak-50').prop('checked', false);

                    data.RP_rak == '1' ? $('#edit-RP-rak').prop('checked', true) : $('#edit-RP-rak').prop('checked', false);
                    data.Gal_rak == '1' ? $('#edit-Gal-rak').prop('checked', true) : $('#edit-Gal-rak').prop('checked', false);
                    data.pagi_rak_51 == '1' ? $('#edit-pagi-rak-51').prop('checked', true) : $('#edit-pagi-rak-51').prop('checked', false);
                    data.siang_rak_51 == '1' ? $('#edit-siang-rak-51').prop('checked', true) : $('#edit-siang-rak-51').prop('checked', false);
                    data.malam_rak_51 == '1' ? $('#edit-malam-rak-51').prop('checked', true) : $('#edit-malam-rak-51').prop('checked', false);

                    data.Kee_rak == '1' ? $('#edit-Kee-rak').prop('checked', true) : $('#edit-Kee-rak').prop('checked', false);
                    data.Lhp_rak == '1' ? $('#edit-Lhp-rak').prop('checked', true) : $('#edit-Lhp-rak').prop('checked', false);
                    data.pagi_rak_52 == '1' ? $('#edit-pagi-rak-52').prop('checked', true) : $('#edit-pagi-rak-52').prop('checked', false);
                    data.siang_rak_52 == '1' ? $('#edit-siang-rak-52').prop('checked', true) : $('#edit-siang-rak-52').prop('checked', false);
                    data.malam_rak_52 == '1' ? $('#edit-malam-rak-52').prop('checked', true) : $('#edit-malam-rak-52').prop('checked', false);

                    data.Kbpdp_rak == '1' ? $('#edit-Kbpdp-rak').prop('checked', true) : $('#edit-Kbpdp-rak').prop('checked', false);
                    data.pagi_rak_53 == '1' ? $('#edit-pagi-rak-53').prop('checked', true) : $('#edit-pagi-rak-53').prop('checked', false);
                    data.siang_rak_53 == '1' ? $('#edit-siang-rak-53').prop('checked', true) : $('#edit-siang-rak-53').prop('checked', false);
                    data.malam_rak_53 == '1' ? $('#edit-malam-rak-53').prop('checked', true) : $('#edit-malam-rak-53').prop('checked', false);

                    data.Ottv_rak == '1' ? $('#edit-Ottv-rak').prop('checked', true) : $('#edit-Ottv-rak').prop('checked', false);
                    data.pagi_rak_54 == '1' ? $('#edit-pagi-rak-54').prop('checked', true) : $('#edit-pagi-rak-54').prop('checked', false);
                    data.siang_rak_54 == '1' ? $('#edit-siang-rak-54').prop('checked', true) : $('#edit-siang-rak-54').prop('checked', false);
                    data.malam_rak_54 == '1' ? $('#edit-malam-rak-54').prop('checked', true) : $('#edit-malam-rak-54').prop('checked', false);

                    data.Aium_rak == '1' ? $('#edit-Aium-rak').prop('checked', true) : $('#edit-Aium-rak').prop('checked', false);
                    data.pagi_rak_55 == '1' ? $('#edit-pagi-rak-55').prop('checked', true) : $('#edit-pagi-rak-55').prop('checked', false);
                    data.siang_rak_55 == '1' ? $('#edit-siang-rak-55').prop('checked', true) : $('#edit-siang-rak-55').prop('checked', false);
                    data.malam_rak_55 == '1' ? $('#edit-malam-rak-55').prop('checked', true) : $('#edit-malam-rak-55').prop('checked', false);

                    data.Becpjp_rak == '1' ? $('#edit-Becpjp-rak').prop('checked', true) : $('#edit-Becpjp-rak').prop('checked', false);
                    data.pagi_rak_56 == '1' ? $('#edit-pagi-rak-56').prop('checked', true) : $('#edit-pagi-rak-56').prop('checked', false);
                    data.siang_rak_56 == '1' ? $('#edit-siang-rak-56').prop('checked', true) : $('#edit-siang-rak-56').prop('checked', false);
                    data.malam_rak_56 == '1' ? $('#edit-malam-rak-56').prop('checked', true) : $('#edit-malam-rak-56').prop('checked', false);

                    data.Betbpp_rak == '1' ? $('#edit-Betbpp-rak').prop('checked', true) : $('#edit-Betbpp-rak').prop('checked', false);
                    data.pagi_rak_57 == '1' ? $('#edit-pagi-rak-57').prop('checked', true) : $('#edit-pagi-rak-57').prop('checked', false);
                    data.siang_rak_57 == '1' ? $('#edit-siang-rak-57').prop('checked', true) : $('#edit-siang-rak-57').prop('checked', false);
                    data.malam_rak_57 == '1' ? $('#edit-malam-rak-57').prop('checked', true) : $('#edit-malam-rak-57').prop('checked', false);

                    data.PkRr_rak == '1' ? $('#edit-PkRr-rak').prop('checked', true) : $('#edit-PkRr-rak').prop('checked', false);
                    data.pagi_rak_58 == '1' ? $('#edit-pagi-rak-58').prop('checked', true) : $('#edit-pagi-rak-58').prop('checked', false);
                    data.siang_rak_58 == '1' ? $('#edit-siang-rak-58').prop('checked', true) : $('#edit-siang-rak-58').prop('checked', false);
                    data.malam_rak_58 == '1' ? $('#edit-malam-rak-58').prop('checked', true) : $('#edit-malam-rak-58').prop('checked', false);

                    data.Kddaa_rak == '1' ? $('#edit-Kddaa-rak').prop('checked', true) : $('#edit-Kddaa-rak').prop('checked', false);
                    data.pagi_rak_59 == '1' ? $('#edit-pagi-rak-59').prop('checked', true) : $('#edit-pagi-rak-59').prop('checked', false);
                    data.siang_rak_59 == '1' ? $('#edit-siang-rak-59').prop('checked', true) : $('#edit-siang-rak-59').prop('checked', false);
                    data.malam_rak_59 == '1' ? $('#edit-malam-rak-59').prop('checked', true) : $('#edit-malam-rak-59').prop('checked', false);
                    $('#edit-lain-rak').val(data.lain_rak);
                    // modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }

        function editRencanaAsuhanKebidanan(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            // console.log('12345');
            const modal = $('#modal-edit-rencana-asuhan-kebidanan-104-00');
            // $('#update-rak').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_edit_rencana_asuhan_kebidanan") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-rak').empty();
                    $('#id-rencana-asuhan-kebidanan-104-00').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }

                    let edit_tanggal_rak = formatTanggalKhusus(data.tanggal_rak);
                    $('#edit-tanggal-rak').val(edit_tanggal_rak);

                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-rencana-asuhan-kebidanan-104-00').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        						<button type="button" class="btn btn-info waves-effect" onclick="updateRencanaAsuhanKebidanan(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-rak').append(cttntndkn);


                     // Set nilai input
                    $('#edit-g-rak-1').val(data.g_rak_1);
                    $('#edit-p-rak-1').val(data.p_rak_1);
                    $('#edit-a-rak-1').val(data.a_rak_1);

                    data.losp_rak == '1' ? $('#edit-losp-rak').prop('checked', true) : $('#edit-losp-rak').prop('checked', false);

                    data.pagi_rak_1 == '1' ? $('#edit-pagi-rak-1').prop('checked', true) : $('#edit-pagi-rak-1').prop('checked', false);

                    data.siang_rak_1 == '1' ? $('#edit-siang-rak-1').prop('checked', true) : $('#edit-siang-rak-1').prop('checked', false);
                    data.malam_rak_1 == '1' ? $('#edit-malam-rak-1').prop('checked', true) : $('#edit-malam-rak-1').prop('checked', false);

                    $('#edit-hm-rak-1').val(data.hm_rak_1);
                    data.ds3m_rak == '1' ? $('#edit-ds3m-rak').prop('checked', true) : $('#edit-ds3m-rak').prop('checked', false);
                    data.pagi_rak_2 == '1' ? $('#edit-pagi-rak-2').prop('checked', true) : $('#edit-pagi-rak-2').prop('checked', false);
                    data.siang_rak_2 == '1' ? $('#edit-siang-rak-2').prop('checked', true) : $('#edit-siang-rak-2').prop('checked', false);
                    data.malam_rak_2 == '1' ? $('#edit-malam-rak-2').prop('checked', true) : $('#edit-malam-rak-2').prop('checked', false);

                    data.pkI_rak == '1' ? $('#edit-pkI-rak').prop('checked', true) : $('#edit-pkI-rak').prop('checked', false);
                    data.hks3m_rak == '1' ? $('#edit-hks3m-rak').prop('checked', true) : $('#edit-hks3m-rak').prop('checked', false);
                    data.pagi_rak_3 == '1' ? $('#edit-pagi-rak-3').prop('checked', true) : $('#edit-pagi-rak-3').prop('checked', false);
                    data.siang_rak_3 == '1' ? $('#edit-siang-rak-3').prop('checked', true) : $('#edit-siang-rak-3').prop('checked', false);
                    data.malam_rak_3 == '1' ? $('#edit-malam-rak-3').prop('checked', true) : $('#edit-malam-rak-3').prop('checked', false);

                    data.bI_rak == '1' ? $('#edit-bI-rak').prop('checked', true) : $('#edit-bI-rak').prop('checked', false);
                    data.ns3m_rak == '1' ? $('#edit-ns3m-rak').prop('checked', true) : $('#edit-ns3m-rak').prop('checked', false);
                    data.pagi_rak_4 == '1' ? $('#edit-pagi-rak-4').prop('checked', true) : $('#edit-pagi-rak-4').prop('checked', false);
                    data.siang_rak_4 == '1' ? $('#edit-siang-rak-4').prop('checked', true) : $('#edit-siang-rak-4').prop('checked', false);
                    data.malam_rak_4 == '1' ? $('#edit-malam-rak-4').prop('checked', true) : $('#edit-malam-rak-4').prop('checked', false);

                    data.rptm_rak == '1' ? $('#edit-rptm-rak').prop('checked', true) : $('#edit-rptm-rak').prop('checked', false);
                    data.pss4j_rak == '1' ? $('#edit-pss4j-rak').prop('checked', true) : $('#edit-pss4j-rak').prop('checked', false);
                    data.pagi_rak_5 == '1' ? $('#edit-pagi-rak-5').prop('checked', true) : $('#edit-pagi-rak-5').prop('checked', false);
                    data.siang_rak_5 == '1' ? $('#edit-siang-rak-5').prop('checked', true) : $('#edit-siang-rak-5').prop('checked', false);
                    data.malam_rak_5 == '1' ? $('#edit-malam-rak-5').prop('checked', true) : $('#edit-malam-rak-5').prop('checked', false);

                    data.cemas_rak == '1' ? $('#edit-cemas-rak').prop('checked', true) : $('#edit-cemas-rak').prop('checked', false);
                    data.tddss4j_rak == '1' ? $('#edit-tddss4j-rak').prop('checked', true) : $('#edit-tddss4j-rak').prop('checked', false);
                    data.pagi_rak_6 == '1' ? $('#edit-pagi-rak-6').prop('checked', true) : $('#edit-pagi-rak-6').prop('checked', false);
                    data.siang_rak_6 == '1' ? $('#edit-siang-rak-6').prop('checked', true) : $('#edit-siang-rak-6').prop('checked', false);
                    data.malam_rak_6 == '1' ? $('#edit-malam-rak-6').prop('checked', true) : $('#edit-malam-rak-6').prop('checked', false);

                    data.N_rak == '1' ? $('#edit-N-rak').prop('checked', true) : $('#edit-N-rak').prop('checked', false);
                    data.pus24j_rak == '1' ? $('#edit-pus24j-rak').prop('checked', true) : $('#edit-pus24j-rak').prop('checked', false);
                    data.pagi_rak_7 == '1' ? $('#edit-pagi-rak-7').prop('checked', true) : $('#edit-pagi-rak-7').prop('checked', false);
                    data.siang_rak_7 == '1' ? $('#edit-siang-rak-7').prop('checked', true) : $('#edit-siang-rak-7').prop('checked', false);
                    data.malam_rak_7 == '1' ? $('#edit-malam-rak-7').prop('checked', true) : $('#edit-malam-rak-7').prop('checked', false);


                    data.ke_rak == '1' ? $('#edit-ke-rak').prop('checked', true) : $('#edit-ke-rak').prop('checked', false);
                    data.fiumpp_rak == '1' ? $('#edit-fiumpp-rak').prop('checked', true) : $('#edit-fiumpp-rak').prop('checked', false);
                    data.pagi_rak_8 == '1' ? $('#edit-pagi-rak-8').prop('checked', true) : $('#edit-pagi-rak-8').prop('checked', false);
                    data.siang_rak_8 == '1' ? $('#edit-siang-rak-8').prop('checked', true) : $('#edit-siang-rak-8').prop('checked', false);
                    data.malam_rak_8 == '1' ? $('#edit-malam-rak-8').prop('checked', true) : $('#edit-malam-rak-8').prop('checked', false);

                    data.fiumdm_rak == '1' ? $('#edit-fiumdm-rak').prop('checked', true) : $('#edit-fiumdm-rak').prop('checked', false);
                    data.pagi_rak_9 == '1' ? $('#edit-pagi-rak-9').prop('checked', true) : $('#edit-pagi-rak-9').prop('checked', false);
                    data.siang_rak_9 == '1' ? $('#edit-siang-rak-9').prop('checked', true) : $('#edit-siang-rak-9').prop('checked', false);
                    data.malam_rak_9 == '1' ? $('#edit-malam-rak-9').prop('checked', true) : $('#edit-malam-rak-9').prop('checked', false);

                    data.fiub_rak == '1' ? $('#edit-fiub-rak').prop('checked', true) : $('#edit-fiub-rak').prop('checked', false);
                    data.pagi_rak_10 == '1' ? $('#edit-pagi-rak-10').prop('checked', true) : $('#edit-pagi-rak-10').prop('checked', false);
                    data.siang_rak_10 == '1' ? $('#edit-siang-rak-10').prop('checked', true) : $('#edit-siang-rak-10').prop('checked', false);
                    data.malam_rak_10 == '1' ? $('#edit-malam-rak-10').prop('checked', true) : $('#edit-malam-rak-10').prop('checked', false);

                    data.ajiumk_rak == '1' ? $('#edit-ajiumk-rak').prop('checked', true) : $('#edit-ajiumk-rak').prop('checked', false);
                    data.pagi_rak_11 == '1' ? $('#edit-pagi-rak-11').prop('checked', true) : $('#edit-pagi-rak-11').prop('checked', false);
                    data.siang_rak_11 == '1' ? $('#edit-siang-rak-11').prop('checked', true) : $('#edit-siang-rak-11').prop('checked', false);
                    data.malam_rak_11 == '1' ? $('#edit-malam-rak-11').prop('checked', true) : $('#edit-malam-rak-11').prop('checked', false);


                    data.atrumn_rak == '1' ? $('#edit-atrumn-rak').prop('checked', true) : $('#edit-atrumn-rak').prop('checked', false);
                    data.pagi_rak_12 == '1' ? $('#edit-pagi-rak-12').prop('checked', true) : $('#edit-pagi-rak-12').prop('checked', false);
                    data.siang_rak_12 == '1' ? $('#edit-siang-rak-12').prop('checked', true) : $('#edit-siang-rak-12').prop('checked', false);
                    data.malam_rak_12 == '1' ? $('#edit-malam-rak-12').prop('checked', true) : $('#edit-malam-rak-12').prop('checked', false);

                    data.lsppsh_rak == '1' ? $('#edit-lsppsh-rak').prop('checked', true) : $('#edit-lsppsh-rak').prop('checked', false);
                    data.pagi_rak_13 == '1' ? $('#edit-pagi-rak-13').prop('checked', true) : $('#edit-pagi-rak-13').prop('checked', false);
                    data.siang_rak_13 == '1' ? $('#edit-siang-rak-13').prop('checked', true) : $('#edit-siang-rak-13').prop('checked', false);
                    data.malam_rak_13 == '1' ? $('#edit-malam-rak-13').prop('checked', true) : $('#edit-malam-rak-13').prop('checked', false);

                    data.akumd_rak == '1' ? $('#edit-akumd-rak').prop('checked', true) : $('#edit-akumd-rak').prop('checked', false);
                    data.pagi_rak_14 == '1' ? $('#edit-pagi-rak-14').prop('checked', true) : $('#edit-pagi-rak-14').prop('checked', false);
                    data.siang_rak_14 == '1' ? $('#edit-siang-rak-14').prop('checked', true) : $('#edit-siang-rak-14').prop('checked', false);
                    data.malam_rak_14 == '1' ? $('#edit-malam-rak-14').prop('checked', true) : $('#edit-malam-rak-14').prop('checked', false);

                    data.bepdkk_rak == '1' ? $('#edit-bepdkk-rak').prop('checked', true) : $('#edit-bepdkk-rak').prop('checked', false);
                    data.pagi_rak_15 == '1' ? $('#edit-pagi-rak-15').prop('checked', true) : $('#edit-pagi-rak-15').prop('checked', false);
                    data.siang_rak_15 == '1' ? $('#edit-siang-rak-15').prop('checked', true) : $('#edit-siang-rak-15').prop('checked', false);
                    data.malam_rak_15 == '1' ? $('#edit-malam-rak-15').prop('checked', true) : $('#edit-malam-rak-15').prop('checked', false);

                    data.bepp_rak == '1' ? $('#edit-bepp-rak').prop('checked', true) : $('#edit-bepp-rak').prop('checked', false);
                    data.pagi_rak_16 == '1' ? $('#edit-pagi-rak-16').prop('checked', true) : $('#edit-pagi-rak-16').prop('checked', false);
                    data.siang_rak_16 == '1' ? $('#edit-siang-rak-16').prop('checked', true) : $('#edit-siang-rak-16').prop('checked', false);
                    data.malam_rak_16 == '1' ? $('#edit-malam-rak-16').prop('checked', true) : $('#edit-malam-rak-16').prop('checked', false);

                    data.BetI_rak == '1' ? $('#edit-BetI-rak').prop('checked', true) : $('#edit-BetI-rak').prop('checked', false);
                    data.pagi_rak_17 == '1' ? $('#edit-pagi-rak-17').prop('checked', true) : $('#edit-pagi-rak-17').prop('checked', false);
                    data.siang_rak_17 == '1' ? $('#edit-siang-rak-17').prop('checked', true) : $('#edit-siang-rak-17').prop('checked', false);
                    data.malam_rak_17 == '1' ? $('#edit-malam-rak-17').prop('checked', true) : $('#edit-malam-rak-17').prop('checked', false);

                    data.Saap_rak == '1' ? $('#edit-Saap-rak').prop('checked', true) : $('#edit-Saap-rak').prop('checked', false);
                    data.pagi_rak_18 == '1' ? $('#edit-pagi-rak-18').prop('checked', true) : $('#edit-pagi-rak-18').prop('checked', false);
                    data.siang_rak_18 == '1' ? $('#edit-siang-rak-18').prop('checked', true) : $('#edit-siang-rak-18').prop('checked', false);
                    data.malam_rak_18 == '1' ? $('#edit-malam-rak-18').prop('checked', true) : $('#edit-malam-rak-18').prop('checked', false);

                    data.Kddaadpt_rak == '1' ? $('#edit-Kddaadpt-rak').prop('checked', true) : $('#edit-Kddaadpt-rak').prop('checked', false);
                    data.pagi_rak_19 == '1' ? $('#edit-pagi-rak-19').prop('checked', true) : $('#edit-pagi-rak-19').prop('checked', false);
                    data.siang_rak_19 == '1' ? $('#edit-siang-rak-19').prop('checked', true) : $('#edit-siang-rak-19').prop('checked', false);
                    data.malam_rak_19 == '1' ? $('#edit-malam-rak-19').prop('checked', true) : $('#edit-malam-rak-19').prop('checked', false);

                    $('#edit-JP-rak').val(data.JP_rak);
                    data.LoDdkj_rak == '1' ? $('#edit-LoDdkj-rak').prop('checked', true) : $('#edit-LoDdkj-rak').prop('checked', false);
                    data.pagi_rak_20 == '1' ? $('#edit-pagi-rak-20').prop('checked', true) : $('#edit-pagi-rak-20').prop('checked', false);
                    data.siang_rak_20 == '1' ? $('#edit-siang-rak-20').prop('checked', true) : $('#edit-siang-rak-20').prop('checked', false);
                    data.malam_rak_20 == '1' ? $('#edit-malam-rak-20').prop('checked', true) : $('#edit-malam-rak-20').prop('checked', false);

                    data.TH_rak == '1' ? $('#edit-TH-rak').prop('checked', true) : $('#edit-TH-rak').prop('checked', false);
                    data.Logj_rak == '1' ? $('#edit-Logj-rak').prop('checked', true) : $('#edit-Logj-rak').prop('checked', false);
                    data.pagi_rak_21 == '1' ? $('#edit-pagi-rak-21').prop('checked', true) : $('#edit-pagi-rak-21').prop('checked', false);
                    data.siang_rak_21 == '1' ? $('#edit-siang-rak-21').prop('checked', true) : $('#edit-siang-rak-21').prop('checked', false);
                    data.malam_rak_21 == '1' ? $('#edit-malam-rak-21').prop('checked', true) : $('#edit-malam-rak-21').prop('checked', false);

                    data.kosong_rak == '1' ? $('#edit-kosong-rak').prop('checked', true) : $('#edit-kosong-rak').prop('checked', false);
                    $('#edit-kosoong-rak').val(data.kosoong_rak);
                    data.siapkan_rak == '1' ? $('#edit-siapkan-rak').prop('checked', true) : $('#edit-siapkan-rak').prop('checked', false);
                    data.pagi_rak_22 == '1' ? $('#edit-pagi-rak-22').prop('checked', true) : $('#edit-pagi-rak-22').prop('checked', false);
                    data.siang_rak_22 == '1' ? $('#edit-siang-rak-22').prop('checked', true) : $('#edit-siang-rak-22').prop('checked', false);
                    data.malam_rak_22 == '1' ? $('#edit-malam-rak-22').prop('checked', true) : $('#edit-malam-rak-22').prop('checked', false);

                    data.Rgj_rak == '1' ? $('#edit-Rgj-rak').prop('checked', true) : $('#edit-Rgj-rak').prop('checked', false);
                    data.Kddaadp_rak == '1' ? $('#edit-Kddaadp-rak').prop('checked', true) : $('#edit-Kddaadp-rak').prop('checked', false);
                    data.pagi_rak_23 == '1' ? $('#edit-pagi-rak-23').prop('checked', true) : $('#edit-pagi-rak-23').prop('checked', false);
                    data.siang_rak_23 == '1' ? $('#edit-siang-rak-23').prop('checked', true) : $('#edit-siang-rak-23').prop('checked', false);
                    data.malam_rak_23 == '1' ? $('#edit-malam-rak-23').prop('checked', true) : $('#edit-malam-rak-23').prop('checked', false);

                    $('#edit-GG-rak').val(data.GG_rak);
                    $('#edit-PP-rak').val(data.PP_rak);
                    $('#edit-AA-rak').val(data.AA_rak);
                    data.PtkII_rak == '1' ? $('#edit-PtkII-rak').prop('checked', true) : $('#edit-PtkII-rak').prop('checked', false);
                    data.pagi_rak_24 == '1' ? $('#edit-pagi-rak-24').prop('checked', true) : $('#edit-pagi-rak-24').prop('checked', false);
                    data.siang_rak_24 == '1' ? $('#edit-siang-rak-24').prop('checked', true) : $('#edit-siang-rak-24').prop('checked', false);
                    data.malam_rak_24 == '1' ? $('#edit-malam-rak-24').prop('checked', true) : $('#edit-malam-rak-24').prop('checked', false);

                    $('#edit-Hmm-rak').val(data.Hmm_rak);
                    data.Api_rak == '1' ? $('#edit-Api-rak').prop('checked', true) : $('#edit-Api-rak').prop('checked', false);
                    data.pagi_rak_25 == '1' ? $('#edit-pagi-rak-25').prop('checked', true) : $('#edit-pagi-rak-25').prop('checked', false);
                    data.siang_rak_25 == '1' ? $('#edit-siang-rak-25').prop('checked', true) : $('#edit-siang-rak-25').prop('checked', false);
                    data.malam_rak_25 == '1' ? $('#edit-malam-rak-25').prop('checked', true) : $('#edit-malam-rak-25').prop('checked', false);

                    data.PkII_rak == '1' ? $('#edit-PkII-rak').prop('checked', true) : $('#edit-PkII-rak').prop('checked', false);
                    data.pagi_rak_26 == '1' ? $('#edit-pagi-rak-26').prop('checked', true) : $('#edit-pagi-rak-26').prop('checked', false);
                    data.siang_rak_26 == '1' ? $('#edit-siang-rak-26').prop('checked', true) : $('#edit-siang-rak-26').prop('checked', false);
                    data.malam_rak_26 == '1' ? $('#edit-malam-rak-26').prop('checked', true) : $('#edit-malam-rak-26').prop('checked', false);


                    data.Rpm_rak == '1' ? $('#edit-Rpm-rak').prop('checked', true) : $('#edit-Rpm-rak').prop('checked', false);
                    data.Pmjah_rak == '1' ? $('#edit-Pmjah-rak').prop('checked', true) : $('#edit-Pmjah-rak').prop('checked', false);
                    data.pagi_rak_27 == '1' ? $('#edit-pagi-rak-27').prop('checked', true) : $('#edit-pagi-rak-27').prop('checked', false);
                    data.siang_rak_27 == '1' ? $('#edit-siang-rak-27').prop('checked', true) : $('#edit-siang-rak-27').prop('checked', false);
                    data.malam_rak_27 == '1' ? $('#edit-malam-rak-27').prop('checked', true) : $('#edit-malam-rak-27').prop('checked', false);

                    data.Raj_rak == '1' ? $('#edit-Raj-rak').prop('checked', true) : $('#edit-Raj-rak').prop('checked', false);
                    data.oDsm_rak == '1' ? $('#edit-oDsm-rak').prop('checked', true) : $('#edit-oDsm-rak').prop('checked', false);
                    data.pagi_rak_28 == '1' ? $('#edit-pagi-rak-28').prop('checked', true) : $('#edit-pagi-rak-28').prop('checked', false);
                    data.siang_rak_28 == '1' ? $('#edit-siang-rak-28').prop('checked', true) : $('#edit-siang-rak-28').prop('checked', false);
                    data.malam_rak_28 == '1' ? $('#edit-malam-rak-28').prop('checked', true) : $('#edit-malam-rak-28').prop('checked', false);

                    data.Pk_rak == '1' ? $('#edit-Pk-rak').prop('checked', true) : $('#edit-Pk-rak').prop('checked', false);
                    data.pagi_rak_29 == '1' ? $('#edit-pagi-rak-29').prop('checked', true) : $('#edit-pagi-rak-29').prop('checked', false);
                    data.siang_rak_29 == '1' ? $('#edit-siang-rak-29').prop('checked', true) : $('#edit-siang-rak-29').prop('checked', false);
                    data.malam_rak_29 == '1' ? $('#edit-malam-rak-29').prop('checked', true) : $('#edit-malam-rak-29').prop('checked', false);

                    data.Lebp_rak == '1' ? $('#edit-Lebp-rak').prop('checked', true) : $('#edit-Lebp-rak').prop('checked', false);
                    data.pagi_rak_30 == '1' ? $('#edit-pagi-rak-30').prop('checked', true) : $('#edit-pagi-rak-30').prop('checked', false);
                    data.siang_rak_30 == '1' ? $('#edit-siang-rak-30').prop('checked', true) : $('#edit-siang-rak-30').prop('checked', false);
                    data.malam_rak_30 == '1' ? $('#edit-malam-rak-30').prop('checked', true) : $('#edit-malam-rak-30').prop('checked', false);

                    data.Lb_rak == '1' ? $('#edit-Lb-rak').prop('checked', true) : $('#edit-Lb-rak').prop('checked', false);
                    data.pagi_rak_31 == '1' ? $('#edit-pagi-rak-31').prop('checked', true) : $('#edit-pagi-rak-31').prop('checked', false);
                    data.siang_rak_31 == '1' ? $('#edit-siang-rak-31').prop('checked', true) : $('#edit-siang-rak-31').prop('checked', false);
                    data.malam_rak_31 == '1' ? $('#edit-malam-rak-31').prop('checked', true) : $('#edit-malam-rak-31').prop('checked', false);

                    data.Lbdpi_rak == '1' ? $('#edit-Lbdpi-rak').prop('checked', true) : $('#edit-Lbdpi-rak').prop('checked', false);
                    data.pagi_rak_32 == '1' ? $('#edit-pagi-rak-32').prop('checked', true) : $('#edit-pagi-rak-32').prop('checked', false);
                    data.siang_rak_32 == '1' ? $('#edit-siang-rak-32').prop('checked', true) : $('#edit-siang-rak-32').prop('checked', false);
                    data.malam_rak_32 == '1' ? $('#edit-malam-rak-32').prop('checked', true) : $('#edit-malam-rak-32').prop('checked', false);

                    data.Bjnb_rak == '1' ? $('#edit-Bjnb-rak').prop('checked', true) : $('#edit-Bjnb-rak').prop('checked', false);
                    data.pagi_rak_33 == '1' ? $('#edit-pagi-rak-33').prop('checked', true) : $('#edit-pagi-rak-33').prop('checked', false);
                    data.siang_rak_33 == '1' ? $('#edit-siang-rak-33').prop('checked', true) : $('#edit-siang-rak-33').prop('checked', false);
                    data.malam_rak_33 == '1' ? $('#edit-malam-rak-33').prop('checked', true) : $('#edit-malam-rak-33').prop('checked', false);

                    data.Kbslr_rak == '1' ? $('#edit-Kbslr-rak').prop('checked', true) : $('#edit-Kbslr-rak').prop('checked', false);
                    data.pagi_rak_34 == '1' ? $('#edit-pagi-rak-34').prop('checked', true) : $('#edit-pagi-rak-34').prop('checked', false);
                    data.siang_rak_34 == '1' ? $('#edit-siang-rak-34').prop('checked', true) : $('#edit-siang-rak-34').prop('checked', false);
                    data.malam_rak_34 == '1' ? $('#edit-malam-rak-34').prop('checked', true) : $('#edit-malam-rak-34').prop('checked', false);

                    data.Gkyb_rak == '1' ? $('#edit-Gkyb-rak').prop('checked', true) : $('#edit-Gkyb-rak').prop('checked', false);
                    data.pagi_rak_35 == '1' ? $('#edit-pagi-rak-35').prop('checked', true) : $('#edit-pagi-rak-35').prop('checked', false);
                    data.siang_rak_35 == '1' ? $('#edit-siang-rak-35').prop('checked', true) : $('#edit-siang-rak-35').prop('checked', false);
                    data.malam_rak_35 == '1' ? $('#edit-malam-rak-35').prop('checked', true) : $('#edit-malam-rak-35').prop('checked', false);

                    data.Nsabm_rak == '1' ? $('#edit-Nsabm-rak').prop('checked', true) : $('#edit-Nsabm-rak').prop('checked', false);
                    data.pagi_rak_36 == '1' ? $('#edit-pagi-rak-36').prop('checked', true) : $('#edit-pagi-rak-36').prop('checked', false);
                    data.siang_rak_36 == '1' ? $('#edit-siang-rak-36').prop('checked', true) : $('#edit-siang-rak-36').prop('checked', false);
                    data.malam_rak_36 == '1' ? $('#edit-malam-rak-36').prop('checked', true) : $('#edit-malam-rak-36').prop('checked', false);

                    data.Cjk_rak == '1' ? $('#edit-Cjk-rak').prop('checked', true) : $('#edit-Cjk-rak').prop('checked', false);
                    data.pagi_rak_37 == '1' ? $('#edit-pagi-rak-37').prop('checked', true) : $('#edit-pagi-rak-37').prop('checked', false);
                    data.siang_rak_37 == '1' ? $('#edit-siang-rak-37').prop('checked', true) : $('#edit-siang-rak-37').prop('checked', false);
                    data.malam_rak_37 == '1' ? $('#edit-malam-rak-37').prop('checked', true) : $('#edit-malam-rak-37').prop('checked', false);

                    data.Kddaakp_rak == '1' ? $('#edit-Kddaakp-rak').prop('checked', true) : $('#edit-Kddaakp-rak').prop('checked', false);
                    data.pagi_rak_38 == '1' ? $('#edit-pagi-rak-38').prop('checked', true) : $('#edit-pagi-rak-38').prop('checked', false);
                    data.siang_rak_38 == '1' ? $('#edit-siang-rak-38').prop('checked', true) : $('#edit-siang-rak-38').prop('checked', false);
                    data.malam_rak_38 == '1' ? $('#edit-malam-rak-38').prop('checked', true) : $('#edit-malam-rak-38').prop('checked', false);

                    $('#edit-p2-rak').val(data.p2_rak);
                    $('#edit-a2-rak').val(data.a2_rak);
                    data.ls1_rak == '1' ? $('#edit-ls1-rak').prop('checked', true) : $('#edit-ls1-rak').prop('checked', false);
                    data.pagi_rak_39 == '1' ? $('#edit-pagi-rak-39').prop('checked', true) : $('#edit-pagi-rak-39').prop('checked', false);
                    data.siang_rak_39 == '1' ? $('#edit-siang-rak-39').prop('checked', true) : $('#edit-siang-rak-39').prop('checked', false);
                    data.malam_rak_39 == '1' ? $('#edit-malam-rak-39').prop('checked', true) : $('#edit-malam-rak-39').prop('checked', false);

                    data.Jdptp_rak == '1' ? $('#edit-Jdptp-rak').prop('checked', true) : $('#edit-Jdptp-rak').prop('checked', false);
                    data.pagi_rak_40 == '1' ? $('#edit-pagi-rak-40').prop('checked', true) : $('#edit-pagi-rak-40').prop('checked', false);
                    data.siang_rak_40 == '1' ? $('#edit-siang-rak-40').prop('checked', true) : $('#edit-siang-rak-40').prop('checked', false);
                    data.malam_rak_40 == '1' ? $('#edit-malam-rak-40').prop('checked', true) : $('#edit-malam-rak-40').prop('checked', false);

                    data.Rrp_rak == '1' ? $('#edit-Rrp-rak').prop('checked', true) : $('#edit-Rrp-rak').prop('checked', false);
                    data.FbuI_rak == '1' ? $('#edit-FbuI-rak').prop('checked', true) : $('#edit-FbuI-rak').prop('checked', false);
                    data.pagi_rak_41 == '1' ? $('#edit-pagi-rak-41').prop('checked', true) : $('#edit-pagi-rak-41').prop('checked', false);
                    data.siang_rak_41 == '1' ? $('#edit-siang-rak-41').prop('checked', true) : $('#edit-siang-rak-41').prop('checked', false);
                    data.malam_rak_41 == '1' ? $('#edit-malam-rak-41').prop('checked', true) : $('#edit-malam-rak-41').prop('checked', false);

                    data.Bidpp_rak == '1' ? $('#edit-Bidpp-rak').prop('checked', true) : $('#edit-Bidpp-rak').prop('checked', false);
                    data.pagi_rak_42 == '1' ? $('#edit-pagi-rak-42').prop('checked', true) : $('#edit-pagi-rak-42').prop('checked', false);
                    data.siang_rak_42 == '1' ? $('#edit-siang-rak-42').prop('checked', true) : $('#edit-siang-rak-42').prop('checked', false);
                    data.malam_rak_42 == '1' ? $('#edit-malam-rak-42').prop('checked', true) : $('#edit-malam-rak-42').prop('checked', false);

                    data.Lptpt_rak == '1' ? $('#edit-Lptpt-rak').prop('checked', true) : $('#edit-Lptpt-rak').prop('checked', false);
                    data.pagi_rak_43 == '1' ? $('#edit-pagi-rak-43').prop('checked', true) : $('#edit-pagi-rak-43').prop('checked', false);
                    data.siang_rak_43 == '1' ? $('#edit-siang-rak-43').prop('checked', true) : $('#edit-siang-rak-43').prop('checked', false);
                    data.malam_rak_43 == '1' ? $('#edit-malam-rak-43').prop('checked', true) : $('#edit-malam-rak-43').prop('checked', false);

                    data.llp_rak == '1' ? $('#edit-llp-rak').prop('checked', true) : $('#edit-llp-rak').prop('checked', false);
                    data.pagi_rak_44 == '1' ? $('#edit-pagi-rak-44').prop('checked', true) : $('#edit-pagi-rak-44').prop('checked', false);
                    data.siang_rak_44 == '1' ? $('#edit-siang-rak-44').prop('checked', true) : $('#edit-siang-rak-44').prop('checked', false);
                    data.malam_rak_44 == '1' ? $('#edit-malam-rak-44').prop('checked', true) : $('#edit-malam-rak-44').prop('checked', false);

                    data.Mum_rak == '1' ? $('#edit-Mum-rak').prop('checked', true) : $('#edit-Mum-rak').prop('checked', false);
                    data.pagi_rak_45 == '1' ? $('#edit-pagi-rak-45').prop('checked', true) : $('#edit-pagi-rak-45').prop('checked', false);
                    data.siang_rak_45 == '1' ? $('#edit-siang-rak-45').prop('checked', true) : $('#edit-siang-rak-45').prop('checked', false);
                    data.malam_rak_45 == '1' ? $('#edit-malam-rak-45').prop('checked', true) : $('#edit-malam-rak-45').prop('checked', false);

                    data.Pjl_rak == '1' ? $('#edit-Pjl-rak').prop('checked', true) : $('#edit-Pjl-rak').prop('checked', false);
                    data.pagi_rak_46 == '1' ? $('#edit-pagi-rak-46').prop('checked', true) : $('#edit-pagi-rak-46').prop('checked', false);
                    data.siang_rak_46 == '1' ? $('#edit-siang-rak-46').prop('checked', true) : $('#edit-siang-rak-46').prop('checked', false);
                    data.malam_rak_46 == '1' ? $('#edit-malam-rak-46').prop('checked', true) : $('#edit-malam-rak-46').prop('checked', false);

                    data.Nkp_rak == '1' ? $('#edit-Nkp-rak').prop('checked', true) : $('#edit-Nkp-rak').prop('checked', false);
                    data.pagi_rak_47 == '1' ? $('#edit-pagi-rak-47').prop('checked', true) : $('#edit-pagi-rak-47').prop('checked', false);
                    data.siang_rak_47 == '1' ? $('#edit-siang-rak-47').prop('checked', true) : $('#edit-siang-rak-47').prop('checked', false);
                    data.malam_rak_47 == '1' ? $('#edit-malam-rak-47').prop('checked', true) : $('#edit-malam-rak-47').prop('checked', false);

                    data.Kddaakpy_rak == '1' ? $('#edit-Kddaakpy-rak').prop('checked', true) : $('#edit-Kddaakpy-rak').prop('checked', false);
                    data.pagi_rak_48 == '1' ? $('#edit-pagi-rak-48').prop('checked', true) : $('#edit-pagi-rak-48').prop('checked', false);
                    data.siang_rak_48 == '1' ? $('#edit-siang-rak-48').prop('checked', true) : $('#edit-siang-rak-48').prop('checked', false);
                    data.malam_rak_48 == '1' ? $('#edit-malam-rak-48').prop('checked', true) : $('#edit-malam-rak-48').prop('checked', false);

                    $('#edit-PP3-rak').val(data.PP3_rak);
                    $('#edit-AA3-rak').val(data.AA3_rak);
                    data.Lbttv_rak == '1' ? $('#edit-Lbttv-rak').prop('checked', true) : $('#edit-Lbttv-rak').prop('checked', false);
                    data.pagi_rak_49 == '1' ? $('#edit-pagi-rak-49').prop('checked', true) : $('#edit-pagi-rak-49').prop('checked', false);
                    data.siang_rak_49 == '1' ? $('#edit-siang-rak-49').prop('checked', true) : $('#edit-siang-rak-49').prop('checked', false);
                    data.malam_rak_49 == '1' ? $('#edit-malam-rak-49').prop('checked', true) : $('#edit-malam-rak-49').prop('checked', false);

                    data.Pjll_rak == '1' ? $('#edit-Pjll-rak').prop('checked', true) : $('#edit-Pjll-rak').prop('checked', false);
                    data.pagi_rak_50 == '1' ? $('#edit-pagi-rak-50').prop('checked', true) : $('#edit-pagi-rak-50').prop('checked', false);
                    data.siang_rak_50 == '1' ? $('#edit-siang-rak-50').prop('checked', true) : $('#edit-siang-rak-50').prop('checked', false);
                    data.malam_rak_50 == '1' ? $('#edit-malam-rak-50').prop('checked', true) : $('#edit-malam-rak-50').prop('checked', false);

                    data.RP_rak == '1' ? $('#edit-RP-rak').prop('checked', true) : $('#edit-RP-rak').prop('checked', false);
                    data.Gal_rak == '1' ? $('#edit-Gal-rak').prop('checked', true) : $('#edit-Gal-rak').prop('checked', false);
                    data.pagi_rak_51 == '1' ? $('#edit-pagi-rak-51').prop('checked', true) : $('#edit-pagi-rak-51').prop('checked', false);
                    data.siang_rak_51 == '1' ? $('#edit-siang-rak-51').prop('checked', true) : $('#edit-siang-rak-51').prop('checked', false);
                    data.malam_rak_51 == '1' ? $('#edit-malam-rak-51').prop('checked', true) : $('#edit-malam-rak-51').prop('checked', false);

                    data.Kee_rak == '1' ? $('#edit-Kee-rak').prop('checked', true) : $('#edit-Kee-rak').prop('checked', false);
                    data.Lhp_rak == '1' ? $('#edit-Lhp-rak').prop('checked', true) : $('#edit-Lhp-rak').prop('checked', false);
                    data.pagi_rak_52 == '1' ? $('#edit-pagi-rak-52').prop('checked', true) : $('#edit-pagi-rak-52').prop('checked', false);
                    data.siang_rak_52 == '1' ? $('#edit-siang-rak-52').prop('checked', true) : $('#edit-siang-rak-52').prop('checked', false);
                    data.malam_rak_52 == '1' ? $('#edit-malam-rak-52').prop('checked', true) : $('#edit-malam-rak-52').prop('checked', false);

                    data.Kbpdp_rak == '1' ? $('#edit-Kbpdp-rak').prop('checked', true) : $('#edit-Kbpdp-rak').prop('checked', false);
                    data.pagi_rak_53 == '1' ? $('#edit-pagi-rak-53').prop('checked', true) : $('#edit-pagi-rak-53').prop('checked', false);
                    data.siang_rak_53 == '1' ? $('#edit-siang-rak-53').prop('checked', true) : $('#edit-siang-rak-53').prop('checked', false);
                    data.malam_rak_53 == '1' ? $('#edit-malam-rak-53').prop('checked', true) : $('#edit-malam-rak-53').prop('checked', false);

                    data.Ottv_rak == '1' ? $('#edit-Ottv-rak').prop('checked', true) : $('#edit-Ottv-rak').prop('checked', false);
                    data.pagi_rak_54 == '1' ? $('#edit-pagi-rak-54').prop('checked', true) : $('#edit-pagi-rak-54').prop('checked', false);
                    data.siang_rak_54 == '1' ? $('#edit-siang-rak-54').prop('checked', true) : $('#edit-siang-rak-54').prop('checked', false);
                    data.malam_rak_54 == '1' ? $('#edit-malam-rak-54').prop('checked', true) : $('#edit-malam-rak-54').prop('checked', false);

                    data.Aium_rak == '1' ? $('#edit-Aium-rak').prop('checked', true) : $('#edit-Aium-rak').prop('checked', false);
                    data.pagi_rak_55 == '1' ? $('#edit-pagi-rak-55').prop('checked', true) : $('#edit-pagi-rak-55').prop('checked', false);
                    data.siang_rak_55 == '1' ? $('#edit-siang-rak-55').prop('checked', true) : $('#edit-siang-rak-55').prop('checked', false);
                    data.malam_rak_55 == '1' ? $('#edit-malam-rak-55').prop('checked', true) : $('#edit-malam-rak-55').prop('checked', false);

                    data.Becpjp_rak == '1' ? $('#edit-Becpjp-rak').prop('checked', true) : $('#edit-Becpjp-rak').prop('checked', false);
                    data.pagi_rak_56 == '1' ? $('#edit-pagi-rak-56').prop('checked', true) : $('#edit-pagi-rak-56').prop('checked', false);
                    data.siang_rak_56 == '1' ? $('#edit-siang-rak-56').prop('checked', true) : $('#edit-siang-rak-56').prop('checked', false);
                    data.malam_rak_56 == '1' ? $('#edit-malam-rak-56').prop('checked', true) : $('#edit-malam-rak-56').prop('checked', false);

                    data.Betbpp_rak == '1' ? $('#edit-Betbpp-rak').prop('checked', true) : $('#edit-Betbpp-rak').prop('checked', false);
                    data.pagi_rak_57 == '1' ? $('#edit-pagi-rak-57').prop('checked', true) : $('#edit-pagi-rak-57').prop('checked', false);
                    data.siang_rak_57 == '1' ? $('#edit-siang-rak-57').prop('checked', true) : $('#edit-siang-rak-57').prop('checked', false);
                    data.malam_rak_57 == '1' ? $('#edit-malam-rak-57').prop('checked', true) : $('#edit-malam-rak-57').prop('checked', false);

                    data.PkRr_rak == '1' ? $('#edit-PkRr-rak').prop('checked', true) : $('#edit-PkRr-rak').prop('checked', false);
                    data.pagi_rak_58 == '1' ? $('#edit-pagi-rak-58').prop('checked', true) : $('#edit-pagi-rak-58').prop('checked', false);
                    data.siang_rak_58 == '1' ? $('#edit-siang-rak-58').prop('checked', true) : $('#edit-siang-rak-58').prop('checked', false);
                    data.malam_rak_58 == '1' ? $('#edit-malam-rak-58').prop('checked', true) : $('#edit-malam-rak-58').prop('checked', false);

                    data.Kddaa_rak == '1' ? $('#edit-Kddaa-rak').prop('checked', true) : $('#edit-Kddaa-rak').prop('checked', false);
                    data.pagi_rak_59 == '1' ? $('#edit-pagi-rak-59').prop('checked', true) : $('#edit-pagi-rak-59').prop('checked', false);
                    data.siang_rak_59 == '1' ? $('#edit-siang-rak-59').prop('checked', true) : $('#edit-siang-rak-59').prop('checked', false);
                    data.malam_rak_59 == '1' ? $('#edit-malam-rak-59').prop('checked', true) : $('#edit-malam-rak-59').prop('checked', false);

                    $('#edit-lain-rak').val(data.lain_rak);

                    modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }


        function updateRencanaAsuhanKebidanan(id_pendaftaran, id_layanan_pendaftaran, bed) {
            // console.log($('#form-edit-rencana-asuhan-kebidanan-104-00').serialize());
            $.ajax({
                type: 'put',
                url: '<?= base_url("pelayanan/api/pelayanan/update_rencana_asuhan_kebidanan") ?>',
                data: $('#form-edit-rencana-asuhan-kebidanan-104-00').serialize(),
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        messageEditSuccess();
                        entriRencanaAsuhanKebidanan(id_pendaftaran, id_layanan_pendaftaran, bed);
                    } else {
                        messageEditFailed();
                    }
                    $('#modal-edit-rencana-asuhan-kebidanan-104-00').modal('hide');
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }


        if (typeof numberRAK === 'undefined') {
            var numberRAK = 1;
        }

        function tambahRencanaAsuhanKebidanan() {
            // console.log(tambahRencanaAsuhanKebidanan());  

            if ($('#tanggal-rak').val() === '') {
                syams_validation('#tanggal-rak', 'Tanggal harus diisi.');
                return false;
            } else {
                syams_validation_remove('#tanggal-rak');
            }

            let html = '';
            let tanggal_rak = $('#tanggal-rak').val();   
            let g_rak_1 = $('#g-rak-1').val();   
            let p_rak_1 = $('#p-rak-1').val();   
            let a_rak_1 = $('#a-rak-1').val();   
            let losp_rak = $('#losp-rak').is(':checked');
            let pagi_rak_1 = $('#pagi-rak-1').is(':checked');
            let siang_rak_1 = $('#siang-rak-1').is(':checked');
            let malam_rak_1 = $('#malam-rak-1').is(':checked');

            let hm_rak_1 = $('#hm-rak-1').val();   
            let ds3m_rak = $('#ds3m-rak').is(':checked');
            let pagi_rak_2 = $('#pagi-rak-2').is(':checked');
            let siang_rak_2 = $('#siang-rak-2').is(':checked');
            let malam_rak_2 = $('#malam-rak-2').is(':checked');

            let pkI_rak = $('#pkI-rak').is(':checked');
            let hks3m_rak = $('#hks3m-rak').is(':checked');
            let pagi_rak_3 = $('#pagi-rak-3').is(':checked');
            let siang_rak_3 = $('#siang-rak-3').is(':checked');
            let malam_rak_3 = $('#malam-rak-3').is(':checked');

            let bI_rak = $('#bI-rak').is(':checked');
            let ns3m_rak = $('#ns3m-rak').is(':checked');
            let pagi_rak_4 = $('#pagi-rak-4').is(':checked');
            let siang_rak_4 = $('#siang-rak-4').is(':checked');
            let malam_rak_4 = $('#malam-rak-4').is(':checked');
         
            let rptm_rak = $('#rptm-rak').is(':checked');
            let pss4j_rak = $('#pss4j-rak').is(':checked');
            let pagi_rak_5 = $('#pagi-rak-5').is(':checked');
            let siang_rak_5 = $('#siang-rak-5').is(':checked');
            let malam_rak_5 = $('#malam-rak-5').is(':checked');

            let cemas_rak = $('#cemas-rak').is(':checked');
            let tddss4j_rak = $('#tddss4j-rak').is(':checked');
            let pagi_rak_6 = $('#pagi-rak-6').is(':checked');
            let siang_rak_6 = $('#siang-rak-6').is(':checked');
            let malam_rak_6 = $('#malam-rak-6').is(':checked');

            let N_rak = $('#N-rak').is(':checked');
            let pus24j_rak = $('#pus24j-rak').is(':checked');
            let pagi_rak_7 = $('#pagi-rak-7').is(':checked');
            let siang_rak_7 = $('#siang-rak-7').is(':checked');
            let malam_rak_7 = $('#malam-rak-7').is(':checked');

            let ke_rak = $('#ke-rak').is(':checked');
            let fiumpp_rak = $('#fiumpp-rak').is(':checked');
            let pagi_rak_8 = $('#pagi-rak-8').is(':checked');
            let siang_rak_8 = $('#siang-rak-8').is(':checked');
            let malam_rak_8 = $('#malam-rak-8').is(':checked');

            let fiumdm_rak = $('#fiumdm-rak').is(':checked');
            let pagi_rak_9 = $('#pagi-rak-9').is(':checked');
            let siang_rak_9 = $('#siang-rak-9').is(':checked');
            let malam_rak_9 = $('#malam-rak-9').is(':checked');

            let fiub_rak = $('#fiub-rak').is(':checked');
            let pagi_rak_10 = $('#pagi-rak-10').is(':checked');
            let siang_rak_10 = $('#siang-rak-10').is(':checked');
            let malam_rak_10 = $('#malam-rak-10').is(':checked');

            let ajiumk_rak = $('#ajiumk-rak').is(':checked');
            let pagi_rak_11 = $('#pagi-rak-11').is(':checked');
            let siang_rak_11 = $('#siang-rak-11').is(':checked');
            let malam_rak_11 = $('#malam-rak-11').is(':checked');

            let atrumn_rak = $('#atrumn-rak').is(':checked');
            let pagi_rak_12 = $('#pagi-rak-12').is(':checked');
            let siang_rak_12 = $('#siang-rak-12').is(':checked');
            let malam_rak_12 = $('#malam-rak-12').is(':checked');

            let lsppsh_rak = $('#lsppsh-rak').is(':checked');
            let pagi_rak_13 = $('#pagi-rak-13').is(':checked');
            let siang_rak_13 = $('#siang-rak-13').is(':checked');
            let malam_rak_13 = $('#malam-rak-13').is(':checked');

            let akumd_rak = $('#akumd-rak').is(':checked');
            let pagi_rak_14 = $('#pagi-rak-14').is(':checked');
            let siang_rak_14 = $('#siang-rak-14').is(':checked');
            let malam_rak_14 = $('#malam-rak-14').is(':checked');

            let bepdkk_rak = $('#bepdkk-rak').is(':checked');
            let pagi_rak_15 = $('#pagi-rak-15').is(':checked');
            let siang_rak_15 = $('#siang-rak-15').is(':checked');
            let malam_rak_15 = $('#malam-rak-15').is(':checked');

            let bepp_rak = $('#bepp-rak').is(':checked');
            let pagi_rak_16 = $('#pagi-rak-16').is(':checked');
            let siang_rak_16 = $('#siang-rak-16').is(':checked');
            let malam_rak_16 = $('#malam-rak-16').is(':checked');

            let BetI_rak = $('#BetI-rak').is(':checked');
            let pagi_rak_17 = $('#pagi-rak-17').is(':checked');
            let siang_rak_17 = $('#siang-rak-17').is(':checked');
            let malam_rak_17 = $('#malam-rak-17').is(':checked');

            let Saap_rak = $('#Saap-rak').is(':checked');
            let pagi_rak_18 = $('#pagi-rak-18').is(':checked');
            let siang_rak_18 = $('#siang-rak-18').is(':checked');
            let malam_rak_18 = $('#malam-rak-18').is(':checked');

            let Kddaadpt_rak = $('#Kddaadpt-rak').is(':checked');
            let pagi_rak_19 = $('#pagi-rak-19').is(':checked');
            let siang_rak_19 = $('#siang-rak-19').is(':checked');
            let malam_rak_19 = $('#malam-rak-19').is(':checked');

            let JP_rak = $('#JP-rak').val();   
            let LoDdkj_rak = $('#LoDdkj-rak').is(':checked');
            let pagi_rak_20 = $('#pagi-rak-20').is(':checked');
            let siang_rak_20 = $('#siang-rak-20').is(':checked');
            let malam_rak_20 = $('#malam-rak-20').is(':checked');

            let TH_rak = $('#TH-rak').is(':checked');
            let Logj_rak = $('#Logj-rak').is(':checked');
            let pagi_rak_21 = $('#pagi-rak-21').is(':checked');
            let siang_rak_21 = $('#siang-rak-21').is(':checked');
            let malam_rak_21 = $('#malam-rak-21').is(':checked');

            let kosong_rak = $('#kosong-rak').is(':checked');
            let kosoong_rak = $('#kosoong-rak').val();   
            let siapkan_rak = $('#siapkan-rak').is(':checked');
            let pagi_rak_22 = $('#pagi-rak-22').is(':checked');
            let siang_rak_22 = $('#siang-rak-22').is(':checked');
            let malam_rak_22 = $('#malam-rak-22').is(':checked');

            let Rgj_rak = $('#Rgj-rak').is(':checked');
            let Kddaadp_rak = $('#Kddaadp-rak').is(':checked');
            let pagi_rak_23 = $('#pagi-rak-23').is(':checked');
            let siang_rak_23 = $('#siang-rak-23').is(':checked');
            let malam_rak_23 = $('#malam-rak-23').is(':checked');

            let GG_rak = $('#GG-rak').val();   
            let PP_rak = $('#PP-rak').val();   
            let AA_rak = $('#AA-rak').val();   
            let PtkII_rak = $('#PtkII-rak').is(':checked');
            let pagi_rak_24 = $('#pagi-rak-24').is(':checked');
            let siang_rak_24 = $('#siang-rak-24').is(':checked');
            let malam_rak_24 = $('#malam-rak-24').is(':checked');

            let Hmm_rak = $('#Hmm-rak').val();   
            let Api_rak = $('#Api-rak').is(':checked');
            let pagi_rak_25 = $('#pagi-rak-25').is(':checked');
            let siang_rak_25 = $('#siang-rak-25').is(':checked');
            let malam_rak_25 = $('#malam-rak-25').is(':checked');

            let PkII_rak = $('#PkII-rak').is(':checked');
            let pagi_rak_26 = $('#pagi-rak-26').is(':checked');
            let siang_rak_26 = $('#siang-rak-26').is(':checked');
            let malam_rak_26 = $('#malam-rak-26').is(':checked');

            let Rpm_rak = $('#Rpm-rak').is(':checked');
            let Pmjah_rak = $('#Pmjah-rak').is(':checked');
            let pagi_rak_27 = $('#pagi-rak-27').is(':checked');
            let siang_rak_27 = $('#siang-rak-27').is(':checked');
            let malam_rak_27 = $('#malam-rak-27').is(':checked');

            let Raj_rak = $('#Raj-rak').is(':checked');
            let oDsm_rak = $('#oDsm-rak').is(':checked');
            let pagi_rak_28 = $('#pagi-rak-28').is(':checked');
            let siang_rak_28 = $('#siang-rak-28').is(':checked');
            let malam_rak_28 = $('#malam-rak-28').is(':checked');

            let Pk_rak = $('#Pk-rak').is(':checked');
            let pagi_rak_29 = $('#pagi-rak-29').is(':checked');
            let siang_rak_29 = $('#siang-rak-29').is(':checked');
            let malam_rak_29 = $('#malam-rak-29').is(':checked');

            let Lebp_rak = $('#Lebp-rak').is(':checked');
            let pagi_rak_30 = $('#pagi-rak-30').is(':checked');
            let siang_rak_30 = $('#siang-rak-30').is(':checked');
            let malam_rak_30 = $('#malam-rak-30').is(':checked');

            let Lb_rak = $('#Lb-rak').is(':checked');
            let pagi_rak_31 = $('#pagi-rak-31').is(':checked');
            let siang_rak_31 = $('#siang-rak-31').is(':checked');
            let malam_rak_31 = $('#malam-rak-31').is(':checked');

            let Lbdpi_rak = $('#Lbdpi-rak').is(':checked');
            let pagi_rak_32 = $('#pagi-rak-32').is(':checked');
            let siang_rak_32 = $('#siang-rak-32').is(':checked');
            let malam_rak_32 = $('#malam-rak-32').is(':checked');

            let Bjnb_rak = $('#Bjnb-rak').is(':checked');
            let pagi_rak_33 = $('#pagi-rak-33').is(':checked');
            let siang_rak_33 = $('#siang-rak-33').is(':checked');
            let malam_rak_33 = $('#malam-rak-33').is(':checked');

            let Kbslr_rak = $('#Kbslr-rak').is(':checked');
            let pagi_rak_34 = $('#pagi-rak-34').is(':checked');
            let siang_rak_34 = $('#siang-rak-34').is(':checked');
            let malam_rak_34 = $('#malam-rak-34').is(':checked');

            let Gkyb_rak = $('#Gkyb-rak').is(':checked');
            let pagi_rak_35 = $('#pagi-rak-35').is(':checked');
            let siang_rak_35 = $('#siang-rak-35').is(':checked');
            let malam_rak_35 = $('#malam-rak-35').is(':checked');

            let Nsabm_rak = $('#Nsabm-rak').is(':checked');
            let pagi_rak_36 = $('#pagi-rak-36').is(':checked');
            let siang_rak_36 = $('#siang-rak-36').is(':checked');
            let malam_rak_36 = $('#malam-rak-36').is(':checked');
          
            let Cjk_rak = $('#Cjk-rak').is(':checked');
            let pagi_rak_37 = $('#pagi-rak-37').is(':checked');
            let siang_rak_37 = $('#siang-rak-37').is(':checked');
            let malam_rak_37 = $('#malam-rak-37').is(':checked');

            let Kddaakp_rak = $('#Kddaakp-rak').is(':checked');
            let pagi_rak_38 = $('#pagi-rak-38').is(':checked');
            let siang_rak_38 = $('#siang-rak-38').is(':checked');
            let malam_rak_38 = $('#malam-rak-38').is(':checked');

            let p2_rak = $('#p2-rak').val();   
            let a2_rak = $('#a2-rak').val();   
            let ls1_rak = $('#ls1-rak').is(':checked');
            let pagi_rak_39 = $('#pagi-rak-39').is(':checked');
            let siang_rak_39 = $('#siang-rak-39').is(':checked');
            let malam_rak_39 = $('#malam-rak-39').is(':checked');

            let Jdptp_rak = $('#Jdptp-rak').is(':checked');
            let pagi_rak_40 = $('#pagi-rak-40').is(':checked');
            let siang_rak_40 = $('#siang-rak-40').is(':checked');
            let malam_rak_40 = $('#malam-rak-40').is(':checked');

            let Rrp_rak = $('#Rrp-rak').is(':checked');
            let FbuI_rak = $('#FbuI-rak').is(':checked');
            let pagi_rak_41 = $('#pagi-rak-41').is(':checked');
            let siang_rak_41 = $('#siang-rak-41').is(':checked');
            let malam_rak_41 = $('#malam-rak-41').is(':checked');

            let Bidpp_rak = $('#Bidpp-rak').is(':checked');
            let pagi_rak_42 = $('#pagi-rak-42').is(':checked');
            let siang_rak_42 = $('#siang-rak-42').is(':checked');
            let malam_rak_42 = $('#malam-rak-42').is(':checked');

            let Lptpt_rak = $('#Lptpt-rak').is(':checked');
            let pagi_rak_43 = $('#pagi-rak-43').is(':checked');
            let siang_rak_43 = $('#siang-rak-43').is(':checked');
            let malam_rak_43 = $('#malam-rak-43').is(':checked');

            let llp_rak = $('#llp-rak').is(':checked');
            let pagi_rak_44 = $('#pagi-rak-44').is(':checked');
            let siang_rak_44 = $('#siang-rak-44').is(':checked');
            let malam_rak_44 = $('#malam-rak-44').is(':checked');

            let Mum_rak = $('#Mum-rak').is(':checked');
            let pagi_rak_45 = $('#pagi-rak-45').is(':checked');
            let siang_rak_45 = $('#siang-rak-45').is(':checked');
            let malam_rak_45 = $('#malam-rak-45').is(':checked');

            let Pjl_rak = $('#Pjl-rak').is(':checked');
            let pagi_rak_46 = $('#pagi-rak-46').is(':checked');
            let siang_rak_46 = $('#siang-rak-46').is(':checked');
            let malam_rak_46 = $('#malam-rak-46').is(':checked');

            let Nkp_rak = $('#Nkp-rak').is(':checked');
            let pagi_rak_47 = $('#pagi-rak-47').is(':checked');
            let siang_rak_47 = $('#siang-rak-47').is(':checked');
            let malam_rak_47 = $('#malam-rak-47').is(':checked');

            let Kddaakpy_rak = $('#Kddaakpy-rak').is(':checked');
            let pagi_rak_48 = $('#pagi-rak-48').is(':checked');
            let siang_rak_48 = $('#siang-rak-48').is(':checked');
            let malam_rak_48 = $('#malam-rak-48').is(':checked');

            let PP3_rak = $('#PP3-rak').val();   
            let AA3_rak = $('#AA3-rak').val();   
            let Lbttv_rak = $('#Lbttv-rak').is(':checked');
            let pagi_rak_49 = $('#pagi-rak-49').is(':checked');
            let siang_rak_49 = $('#siang-rak-49').is(':checked');
            let malam_rak_49 = $('#malam-rak-49').is(':checked');

            let Pjll_rak = $('#Pjll-rak').is(':checked');
            let pagi_rak_50 = $('#pagi-rak-50').is(':checked');
            let siang_rak_50 = $('#siang-rak-50').is(':checked');
            let malam_rak_50 = $('#malam-rak-50').is(':checked');

            let RP_rak = $('#RP-rak').is(':checked');
            let Gal_rak = $('#Gal-rak').is(':checked');
            let pagi_rak_51 = $('#pagi-rak-51').is(':checked');
            let siang_rak_51 = $('#siang-rak-51').is(':checked');
            let malam_rak_51 = $('#malam-rak-51').is(':checked');

            let Kee_rak = $('#Kee-rak').is(':checked');
            let Lhp_rak = $('#Lhp-rak').is(':checked');
            let pagi_rak_52 = $('#pagi-rak-52').is(':checked');
            let siang_rak_52 = $('#siang-rak-52').is(':checked');
            let malam_rak_52 = $('#malam-rak-52').is(':checked');

            let Kbpdp_rak = $('#Kbpdp-rak').is(':checked');
            let pagi_rak_53 = $('#pagi-rak-53').is(':checked');
            let siang_rak_53 = $('#siang-rak-53').is(':checked');
            let malam_rak_53 = $('#malam-rak-53').is(':checked');

            let Ottv_rak = $('#Ottv-rak').is(':checked');
            let pagi_rak_54 = $('#pagi-rak-54').is(':checked');
            let siang_rak_54 = $('#siang-rak-54').is(':checked');
            let malam_rak_54 = $('#malam-rak-54').is(':checked');

            let Aium_rak = $('#Aium-rak').is(':checked');
            let pagi_rak_55 = $('#pagi-rak-55').is(':checked');
            let siang_rak_55 = $('#siang-rak-55').is(':checked');
            let malam_rak_55 = $('#malam-rak-55').is(':checked');

            let Becpjp_rak = $('#Becpjp-rak').is(':checked');
            let pagi_rak_56 = $('#pagi-rak-56').is(':checked');
            let siang_rak_56 = $('#siang-rak-56').is(':checked');
            let malam_rak_56 = $('#malam-rak-56').is(':checked');

            let Betbpp_rak = $('#Betbpp-rak').is(':checked');
            let pagi_rak_57 = $('#pagi-rak-57').is(':checked');
            let siang_rak_57 = $('#siang-rak-57').is(':checked');
            let malam_rak_57 = $('#malam-rak-57').is(':checked');

            let PkRr_rak = $('#PkRr-rak').is(':checked');
            let pagi_rak_58 = $('#pagi-rak-58').is(':checked');
            let siang_rak_58 = $('#siang-rak-58').is(':checked');
            let malam_rak_58 = $('#malam-rak-58').is(':checked');

            let Kddaa_rak = $('#Kddaa-rak').is(':checked');
            let pagi_rak_59 = $('#pagi-rak-59').is(':checked');
            let siang_rak_59 = $('#siang-rak-59').is(':checked');
            let malam_rak_59 = $('#malam-rak-59').is(':checked');
            let lain_rak = $('#lain-rak').val();   
     
            html = /* html */ `
                <tr class="row-in-${++numberRAK}">
                    <td class="number-pengkajian" align="center">${numberRAK++}</td>
                    <td align="center">
                        <input type="hidden" name="tanggal_rak[]" value="${tanggal_rak}">${tanggal_rak}
                    </td>
                  
                    <td align="center">
                        <?= $this->session->userdata('nama') ?>
                        <input type="hidden" name="user_rak[]" value="<?= $this->session->userdata("id_translucent") ?>">
                        <input type="hidden" name="pengkajian_date_rak[]" value="<?= date("Y-m-d H:i:s") ?>">

                        <input type="hidden" name="g_rak_1[]" value="${g_rak_1}">
                        <input type="hidden" name="p_rak_1[]" value="${p_rak_1}">
                        <input type="hidden" name="a_rak_1[]" value="${a_rak_1}">

                        <input type="hidden" name="losp_rak[]" value="${losp_rak ? 1 : 0}">   

                        <input type="hidden" name="pagi_rak_1[]" value="${pagi_rak_1 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_1[]" value="${siang_rak_1 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_1[]" value="${malam_rak_1 ? 1 : 0}">     
                        
                        <input type="hidden" name="hm_rak_1[]" value="${hm_rak_1}">
                        <input type="hidden" name="ds3m_rak[]" value="${ds3m_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_2[]" value="${pagi_rak_2 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_2[]" value="${siang_rak_2 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_2[]" value="${malam_rak_2 ? 1 : 0}">  

                        <input type="hidden" name="pkI_rak[]" value="${pkI_rak ? 1 : 0}">                                    
                        <input type="hidden" name="hks3m_rak[]" value="${hks3m_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_3[]" value="${pagi_rak_3 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_3[]" value="${siang_rak_3 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_3[]" value="${malam_rak_3 ? 1 : 0}">  

                        <input type="hidden" name="bI_rak[]" value="${bI_rak ? 1 : 0}">                                    
                        <input type="hidden" name="ns3m_rak[]" value="${ns3m_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_4[]" value="${pagi_rak_4 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_4[]" value="${siang_rak_4 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_4[]" value="${malam_rak_4 ? 1 : 0}">

                        <input type="hidden" name="rptm_rak[]" value="${rptm_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pss4j_rak[]" value="${pss4j_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_5[]" value="${pagi_rak_5 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_5[]" value="${siang_rak_5 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_5[]" value="${malam_rak_5 ? 1 : 0}">

                        <input type="hidden" name="cemas_rak[]" value="${cemas_rak ? 1 : 0}">                                    
                        <input type="hidden" name="tddss4j_rak[]" value="${tddss4j_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_6[]" value="${pagi_rak_6 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_6[]" value="${siang_rak_6 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_6[]" value="${malam_rak_6 ? 1 : 0}">

                        <input type="hidden" name="N_rak[]" value="${N_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pus24j_rak[]" value="${pus24j_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_7[]" value="${pagi_rak_7 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_7[]" value="${siang_rak_7 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_7[]" value="${malam_rak_7 ? 1 : 0}">

                        <input type="hidden" name="ke_rak[]" value="${ke_rak ? 1 : 0}">                                    
                        <input type="hidden" name="fiumpp_rak[]" value="${fiumpp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_8[]" value="${pagi_rak_8 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_8[]" value="${siang_rak_8 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_8[]" value="${malam_rak_8 ? 1 : 0}">

                        <input type="hidden" name="fiumdm_rak[]" value="${fiumdm_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_9[]" value="${pagi_rak_9 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_9[]" value="${siang_rak_9 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_9[]" value="${malam_rak_9 ? 1 : 0}">

                        <input type="hidden" name="fiub_rak[]" value="${fiub_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_10[]" value="${pagi_rak_10 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_10[]" value="${siang_rak_10 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_10[]" value="${malam_rak_10 ? 1 : 0}">

                        <input type="hidden" name="ajiumk_rak[]" value="${ajiumk_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_11[]" value="${pagi_rak_11 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_11[]" value="${siang_rak_11 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_11[]" value="${malam_rak_11 ? 1 : 0}">

                        <input type="hidden" name="atrumn_rak[]" value="${atrumn_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_12[]" value="${pagi_rak_12 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_12[]" value="${siang_rak_12 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_12[]" value="${malam_rak_12 ? 1 : 0}">

                        <input type="hidden" name="lsppsh_rak[]" value="${lsppsh_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_13[]" value="${pagi_rak_13 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_13[]" value="${siang_rak_13 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_13[]" value="${malam_rak_13 ? 1 : 0}">

                        <input type="hidden" name="akumd_rak[]" value="${akumd_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_14[]" value="${pagi_rak_14 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_14[]" value="${siang_rak_14 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_14[]" value="${malam_rak_14 ? 1 : 0}">

                        <input type="hidden" name="bepdkk_rak[]" value="${bepdkk_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_15[]" value="${pagi_rak_15 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_15[]" value="${siang_rak_15 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_15[]" value="${malam_rak_15 ? 1 : 0}">

                        <input type="hidden" name="bepp_rak[]" value="${bepp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_16[]" value="${pagi_rak_16 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_16[]" value="${siang_rak_16 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_16[]" value="${malam_rak_16 ? 1 : 0}">

                        <input type="hidden" name="BetI_rak[]" value="${BetI_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_17[]" value="${pagi_rak_17 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_17[]" value="${siang_rak_17 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_17[]" value="${malam_rak_17 ? 1 : 0}">

                        <input type="hidden" name="Saap_rak[]" value="${Saap_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_18[]" value="${pagi_rak_18 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_18[]" value="${siang_rak_18 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_18[]" value="${malam_rak_18 ? 1 : 0}">

                        <input type="hidden" name="Kddaadpt_rak[]" value="${Kddaadpt_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_19[]" value="${pagi_rak_19 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_19[]" value="${siang_rak_19 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_19[]" value="${malam_rak_19 ? 1 : 0}">

                        <input type="hidden" name="JP_rak[]" value="${JP_rak}">
                        <input type="hidden" name="LoDdkj_rak[]" value="${LoDdkj_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_20[]" value="${pagi_rak_20 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_20[]" value="${siang_rak_20 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_20[]" value="${malam_rak_20 ? 1 : 0}">  

                        <input type="hidden" name="TH_rak[]" value="${TH_rak ? 1 : 0}">                                    
                        <input type="hidden" name="Logj_rak[]" value="${Logj_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_21[]" value="${pagi_rak_21 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_21[]" value="${siang_rak_21 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_21[]" value="${malam_rak_21 ? 1 : 0}">  

                        <input type="hidden" name="kosong_rak[]" value="${kosong_rak ? 1 : 0}">                                    
                        <input type="hidden" name="kosoong_rak[]" value="${kosoong_rak}">                                   
                        <input type="hidden" name="siapkan_rak[]" value="${siapkan_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_22[]" value="${pagi_rak_22 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_22[]" value="${siang_rak_22 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_22[]" value="${malam_rak_22 ? 1 : 0}"> 
                        
                        <input type="hidden" name="Rgj_rak[]" value="${Rgj_rak ? 1 : 0}">                                    
                        <input type="hidden" name="Kddaadp_rak[]" value="${Kddaadp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_23[]" value="${pagi_rak_23 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_23[]" value="${siang_rak_23 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_23[]" value="${malam_rak_23 ? 1 : 0}">  

                        <input type="hidden" name="GG_rak[]" value="${GG_rak}">                                   
                        <input type="hidden" name="PP_rak[]" value="${PP_rak}">                                   
                        <input type="hidden" name="AA_rak[]" value="${AA_rak}">                                   
                        <input type="hidden" name="PtkII_rak[]" value="${PtkII_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_24[]" value="${pagi_rak_24 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_24[]" value="${siang_rak_24 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_24[]" value="${malam_rak_24 ? 1 : 0}"> 

                        <input type="hidden" name="Hmm_rak[]" value="${Hmm_rak}">                                   
                        <input type="hidden" name="Api_rak[]" value="${Api_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_25[]" value="${pagi_rak_25 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_25[]" value="${siang_rak_25 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_25[]" value="${malam_rak_25 ? 1 : 0}"> 

                        <input type="hidden" name="PkII_rak[]" value="${PkII_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_26[]" value="${pagi_rak_26 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_26[]" value="${siang_rak_26 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_26[]" value="${malam_rak_26 ? 1 : 0}"> 

                        <input type="hidden" name="Rpm_rak[]" value="${Rpm_rak ? 1 : 0}">                                    
                        <input type="hidden" name="Pmjah_rak[]" value="${Pmjah_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_27[]" value="${pagi_rak_27 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_27[]" value="${siang_rak_27 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_27[]" value="${malam_rak_27 ? 1 : 0}"> 

                        <input type="hidden" name="Raj_rak[]" value="${Raj_rak ? 1 : 0}">                                    
                        <input type="hidden" name="oDsm_rak[]" value="${oDsm_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_28[]" value="${pagi_rak_28 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_28[]" value="${siang_rak_28 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_28[]" value="${malam_rak_28 ? 1 : 0}"> 

                        <input type="hidden" name="Pk_rak[]" value="${Pk_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_29[]" value="${pagi_rak_29 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_29[]" value="${siang_rak_29 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_29[]" value="${malam_rak_29 ? 1 : 0}"> 
               
                        <input type="hidden" name="Lebp_rak[]" value="${Lebp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_30[]" value="${pagi_rak_30 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_30[]" value="${siang_rak_30 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_30[]" value="${malam_rak_30 ? 1 : 0}"> 

                        <input type="hidden" name="Lb_rak[]" value="${Lb_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_31[]" value="${pagi_rak_31 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_31[]" value="${siang_rak_31 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_31[]" value="${malam_rak_31 ? 1 : 0}"> 

                        <input type="hidden" name="Lbdpi_rak[]" value="${Lbdpi_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_32[]" value="${pagi_rak_32 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_32[]" value="${siang_rak_32 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_32[]" value="${malam_rak_32 ? 1 : 0}"> 

                        <input type="hidden" name="Bjnb_rak[]" value="${Bjnb_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_33[]" value="${pagi_rak_33 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_33[]" value="${siang_rak_33 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_33[]" value="${malam_rak_33 ? 1 : 0}"> 

                        <input type="hidden" name="Kbslr_rak[]" value="${Kbslr_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_34[]" value="${pagi_rak_34 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_34[]" value="${siang_rak_34 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_34[]" value="${malam_rak_34 ? 1 : 0}"> 

                        <input type="hidden" name="Gkyb_rak[]" value="${Gkyb_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_35[]" value="${pagi_rak_35 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_35[]" value="${siang_rak_35 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_35[]" value="${malam_rak_35 ? 1 : 0}"> 

                        <input type="hidden" name="Nsabm_rak[]" value="${Nsabm_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_36[]" value="${pagi_rak_36 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_36[]" value="${siang_rak_36 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_36[]" value="${malam_rak_36 ? 1 : 0}"> 
                    
                        <input type="hidden" name="Cjk_rak[]" value="${Cjk_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_37[]" value="${pagi_rak_37 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_37[]" value="${siang_rak_37 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_37[]" value="${malam_rak_37 ? 1 : 0}"> 
                    
                        <input type="hidden" name="Kddaakp_rak[]" value="${Kddaakp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_38[]" value="${pagi_rak_38 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_38[]" value="${siang_rak_38 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_38[]" value="${malam_rak_38 ? 1 : 0}"> 

                        <input type="hidden" name="p2_rak[]" value="${p2_rak}">                                   
                        <input type="hidden" name="a2_rak[]" value="${a2_rak}">                                   
                        <input type="hidden" name="ls1_rak[]" value="${ls1_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_39[]" value="${pagi_rak_39 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_39[]" value="${siang_rak_39 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_39[]" value="${malam_rak_39 ? 1 : 0}"> 

                        <input type="hidden" name="Jdptp_rak[]" value="${Jdptp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_40[]" value="${pagi_rak_40 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_40[]" value="${siang_rak_40 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_40[]" value="${malam_rak_40 ? 1 : 0}"> 

                        <input type="hidden" name="Rrp_rak[]" value="${Rrp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="FbuI_rak[]" value="${FbuI_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_41[]" value="${pagi_rak_41 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_41[]" value="${siang_rak_41 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_41[]" value="${malam_rak_41 ? 1 : 0}">

                        <input type="hidden" name="Bidpp_rak[]" value="${Bidpp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_42[]" value="${pagi_rak_42 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_42[]" value="${siang_rak_42 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_42[]" value="${malam_rak_42 ? 1 : 0}">

                        <input type="hidden" name="Lptpt_rak[]" value="${Lptpt_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_43[]" value="${pagi_rak_43 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_43[]" value="${siang_rak_43 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_43[]" value="${malam_rak_43 ? 1 : 0}">

                        <input type="hidden" name="llp_rak[]" value="${llp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_44[]" value="${pagi_rak_44 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_44[]" value="${siang_rak_44 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_44[]" value="${malam_rak_44 ? 1 : 0}">

                        <input type="hidden" name="Mum_rak[]" value="${Mum_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_45[]" value="${pagi_rak_45 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_45[]" value="${siang_rak_45 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_45[]" value="${malam_rak_45 ? 1 : 0}">

                        <input type="hidden" name="Pjl_rak[]" value="${Pjl_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_46[]" value="${pagi_rak_46 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_46[]" value="${siang_rak_46 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_46[]" value="${malam_rak_46 ? 1 : 0}">

                        <input type="hidden" name="Nkp_rak[]" value="${Nkp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_47[]" value="${pagi_rak_47 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_47[]" value="${siang_rak_47 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_47[]" value="${malam_rak_47 ? 1 : 0}">

                        <input type="hidden" name="Kddaakpy_rak[]" value="${Kddaakpy_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_48[]" value="${pagi_rak_48 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_48[]" value="${siang_rak_48 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_48[]" value="${malam_rak_48 ? 1 : 0}">

                        <input type="hidden" name="PP3_rak[]" value="${PP3_rak}">                                   
                        <input type="hidden" name="AA3_rak[]" value="${AA3_rak}">                                   
                        <input type="hidden" name="Lbttv_rak[]" value="${Lbttv_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_49[]" value="${pagi_rak_49 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_49[]" value="${siang_rak_49 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_49[]" value="${malam_rak_49 ? 1 : 0}"> 

                        <input type="hidden" name="Pjll_rak[]" value="${Pjll_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_50[]" value="${pagi_rak_50 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_50[]" value="${siang_rak_50 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_50[]" value="${malam_rak_50 ? 1 : 0}"> 

                        <input type="hidden" name="RP_rak[]" value="${RP_rak ? 1 : 0}">                                    
                        <input type="hidden" name="Gal_rak[]" value="${Gal_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_51[]" value="${pagi_rak_51 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_51[]" value="${siang_rak_51 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_51[]" value="${malam_rak_51 ? 1 : 0}"> 

                        <input type="hidden" name="Kee_rak[]" value="${Kee_rak ? 1 : 0}">                                    
                        <input type="hidden" name="Lhp_rak[]" value="${Lhp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_52[]" value="${pagi_rak_52 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_52[]" value="${siang_rak_52 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_52[]" value="${malam_rak_52 ? 1 : 0}"> 

                        <input type="hidden" name="Kbpdp_rak[]" value="${Kbpdp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_53[]" value="${pagi_rak_53 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_53[]" value="${siang_rak_53 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_53[]" value="${malam_rak_53 ? 1 : 0}"> 
                        
                        <input type="hidden" name="Ottv_rak[]" value="${Ottv_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_54[]" value="${pagi_rak_54 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_54[]" value="${siang_rak_54 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_54[]" value="${malam_rak_54 ? 1 : 0}"> 

                        <input type="hidden" name="Aium_rak[]" value="${Aium_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_55[]" value="${pagi_rak_55 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_55[]" value="${siang_rak_55 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_55[]" value="${malam_rak_55 ? 1 : 0}"> 

                        <input type="hidden" name="Becpjp_rak[]" value="${Becpjp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_56[]" value="${pagi_rak_56 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_56[]" value="${siang_rak_56 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_56[]" value="${malam_rak_56 ? 1 : 0}"> 

                        <input type="hidden" name="Betbpp_rak[]" value="${Betbpp_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_57[]" value="${pagi_rak_57 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_57[]" value="${siang_rak_57 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_57[]" value="${malam_rak_57 ? 1 : 0}"> 

                        <input type="hidden" name="PkRr_rak[]" value="${PkRr_rak ? 1 : 0}">                                    
                        <input type="hidden" name="pagi_rak_58[]" value="${pagi_rak_58 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_58[]" value="${siang_rak_58 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_58[]" value="${malam_rak_58 ? 1 : 0}">
                      
                        <input type="hidden" name="Kddaa_rak[]" value="${Kddaa_rak ? 1 : 0}">   
                        <input type="hidden" name="pagi_rak_59[]" value="${pagi_rak_59 ? 1 : 0}">                                    
                        <input type="hidden" name="siang_rak_59[]" value="${siang_rak_59 ? 1 : 0}">                                    
                        <input type="hidden" name="malam_rak_59[]" value="${malam_rak_59 ? 1 : 0}">                    
                        <input type="hidden" name="lain_rak[]" value="${lain_rak}">                                                                     
                    </td>
                    <td align="center">
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
            $('#tabel-rak .body-table').append(html);
        }

        function hapusRencanaAsuhanKebidanan(obj, id) {
            bootbox.dialog({
                message: "Anda yakin akan menghapus data ini?",
                title: "Hapus Data",
                buttons: {
                    batal: {
                        label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                        className: "btn-secondary",
                        callback: function() {
                        }
                    },
                    hapus: {
                        label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                        className: "btn-info",
                        callback: function() {
                            $.ajax({
                                type: 'DELETE',
                                url: '<?= base_url("pelayanan/api/pelayanan/hapus_rencana_asuhan_kebidanan") ?>/' +
                                    id,
                                cache: false,
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.status) {
                                        messageCustom(data.message, 'Success');
                                        removeList(obj);
                                    } else {
                                        customAlert('Hapus Rencana Asuhan Kebidanan', data
                                            .message);
                                    }
                                },
                                error: function(e) {
                                    messageDeleteFailed();
                                }
                            });
                        }
                    }
                }
            });
        }


</script>