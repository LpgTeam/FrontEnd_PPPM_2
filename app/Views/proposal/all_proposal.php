<style>
    @page {
        margin: 5px 5px 10px;
    }

    #footer_page {
        position: fixed;
        right: 20px;
        bottom: 0;
        text-align: center;
    }

    #footer_page .page:after {
        content: 'Halaman 'counter(page)+1;
    }
</style>
<?= $this->include('/proposal/P1_proposal'); ?>
<div style="page-break-before: always;"></div>
<?= $this->include('/proposal/P2_proposal'); ?>
<div style="page-break-before: always;"></div>
<?= $this->include('/proposal/P3_proposal'); ?>
<div style="page-break-before: always;"></div>
<?= $this->include('/proposal/P4_proposal'); ?>
<div style="page-break-before: always;"></div>
<?= $this->include('/proposal/P5_proposal'); ?>