// Proses Peneltian
function tambah(){
    var status = document.getElementById("status").innerHTML ;
    var jenis = document.getElementById("jenis").innerHTML ;
    var alasan = document.getElementById("alasan").innerHTML ;
    var ket = "";
    var list = document.getElementById("list");
    var keterangan = document.getElementById("keterangan");
    keterangan.innerHTML = "";
    list.innerHTML =  "";
    var status1 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p>"+
                "Proposal telah di submit oleh dosen dan menunggu persetujuan Reviewer"+
            "</p>"+
        "</li>";

    var status2 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p>"+
                // "Proposal telah disetujui oleh Reviewer dan menunggu persetujuan BAU"+
                "Proposal telah disetujui oleh Reviewer dan akan diajukan ke kepala PPPM"+
            "</p>"+
        "</li>"; 
        

    var status3 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p>"+
                // "Proposal telah disetujui oleh BAU dan menunggu persetujuan dari Kepala PPPM"+
                "Proposal telah diajukan ke kepala PPPM dan menunggu persetujuan dari Kepala PPPM"+
            "</p>"+
        "</li>"; 
        
    var status4 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p>"+
                "Proposal telah disetujui oleh Kepala PPPM dan menunggu proposal ditandatangani oleh Direktur Polstat STIS"+
            "</p>"+
        "</li>"; 

    var status5 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p>"+
                "Proposal ditandatangani oleh Direktur Polstat STIS"+
            "</p>"+
        "</li>"; 

    var status6 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-cash-coin'></i></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Pendanaan</h5>"+
            "<p>"+
                "Melampirkan bukti pendanaan untuk kegiatan publikasi hasil dari penelitian"+
            "</p>"+
        "</li>";    

    var status61 = innerHTML = 
    "<li class='timeline-item mb-5'>"+
    "<span class='timeline-icon'>"+
        "<i class='bi bi-bookmark-check'></i>"+
    "</span>"+
    "<h5 class='fw-bold'>Kontrak</h5>"+
    "<p>"+
        "Proses Persetujuan Kontrak Penelitian"+
    "</p>"+
"</li>";  

    var status7 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-checklist'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Laporan</h5>"+
            "<p>"+
                "Melaporkan hasil penelitian yang dilakukan oleh dosen"+
            "</p>"+
        "</li>";   
    
    var status8 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-check2-square'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Selesai</h5>"+
            "<p>"+
                "Kegiatan Penelitian Telah Selesai dilsanakan"+
            "</p>"+
        "</li>";

    var status9 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
        "<span class='timeline-icon2'>"+
            "<i class='bi bi-x-lg'></i>"+
        "</span>"+
            "<h5 class='fw-bold'>Ditolak Reviewer</h5>"+
            "<p>"+
                alasan+
            "</p>"+
        "</li>";

    var status10 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
        "<span class='timeline-icon2'>"+
            "<i class='bi bi-x-lg'></i>"+
        "</span>"+
            "<h5 class='fw-bold'>Ditolak BAU</h5>"+
            "<p>"+
                alasan+
            "</p>"+
        "</li>";

    var status11 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
        "<span class='timeline-icon2'>"+
            "<i class='bi bi-x-lg'></i>"+
        "</span>"+
            "<h5 class='fw-bold'>Ditolak Kepala PPPM</h5>"+
            "<p>"+
                alasan+
            "</p>"+
        "</li>";
    
    var tanda = innerHTML = 
        "<h6 style='background : #38E54D; font-size : 5px;'>&nbsp</h6>";

    var tanda2 = innerHTML = 
        "<h6 style='background : #CF0A0A; font-size : 5px;'>&nbsp</h6>";


if (jenis == "Semi Mandiri") {
    if (status == 1){
        list.innerHTML += status1 ;}
    else if (status == 2){
        list.innerHTML += status1 + status2 ;
    }
    else if (status ==  3){
        list.innerHTML += status1 + status2 + status3;
    }
    else if (status == 4){
        list.innerHTML += status1 + status2 + status3 + status4;
    }
    else if (status == 51){
        list.innerHTML += status1 + status2 + status3 + status4 + status5;
    }
    else if (status == 5){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 ;
    }
    else if (status == 6){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 + status7;
    }
    else if (status == 10){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 + status7 + status8;
    }
    else if (status == 7){
        list.innerHTML += status9;
    }
    else if (status == 8){
        list.innerHTML += status10;
    }
    else if (status == 9){
        list.innerHTML += status11;
    }
    
} else if (jenis == "Didanai Institusi" || jenis == "Institusi"){
    if (status == 1){
        list.innerHTML += status1 ;}
    else if (status == 2){
        list.innerHTML += status1 + status2 ;
    }
    else if (status == 3){
        list.innerHTML += status1 + status2 + status3;
    }
    else if (status == 4){
        list.innerHTML += status1 + status2 + status3 + status4;
    }
    else if (status == 51){
        list.innerHTML += status1 + status2 + status3 + status4 + status5;
    }
    else if (status == 5){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 ;
    }
    else if (status == 6){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 + status7;
    }
    else if (status == 10){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 + status7 + status8;
    }
    else if (status == 7){
        list.innerHTML += status9;
    }
    else if (status == 8){
        list.innerHTML += status10;
    }
    else if (status == 9){
        list.innerHTML += status11;
    }
}
    

    if (status == 7 || status == 8 || status == 9){
        keterangan.innerHTML += tanda2 ;}
    else {
        list.innerHTML += tanda ;
    }

console.log(status);

}

tambah()
