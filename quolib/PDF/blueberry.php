<?php
// (A) HTML HEADER & STYLES
$this->data = "<!DOCTYPE html><html><head><style>".
"html,body{font-family:sans-serif}#quotation{max-width:800px;margin:0 auto}#company,#quoinfo{margin-bottom:30px}#quoinfo,#company,#items{width:100%;border-collapse:collapse}#company td,#quoinfo td,#items td,#items th{padding:10px}#company td{vertical-align:top}#bigi{margin-bottom:20px;font-size:28px;font-weight:700;color:#258ec7}#co-addr{font-size:.95em;color:#888}#co-right img{max-width:180px;height:auto}#quoinfo td{width:33%}#items th{text-align:left;background:#98c5dc;padding:20px 10px}#items td{background:#e4eff5;border-bottom:1px solid #c8d2d7}.idesc{color:#6099b6}#items tr.ttl td{background:#98c5dc;border-bottom:none;font-weight:700}.right{text-align:right}#notes,#accept{margin-top:30px}#notes{background:#e4eff5;padding:10px}#accept table{width:100%;border-collapse:collapse}#accept td{border:1px solid #fff;background:#e4eff5;padding:10px 10px 50px 10px;color:#a1a1a1}".
"</style></head><body><div id='quotation'>";

// (B) COMPANY LOGO
$this->data .= "<table id='company'><tr><td id='co-left'><div id='bigi'>QUOTATION</div><div id='co-addr'>";
for ($i=2;$i<count($this->company);$i++) {
	$this->data .= $this->company[$i]."<br>";
}
$this->data .= "</div></td><td id='co-right' class='right'><img src='".$this->company[0]."'/></td></table>";

// (C) CUSTOMER
$this->data .= "<table id='quoinfo'><tr><td><strong>CUSTOMER</strong><br>";
foreach ($this->customer as $c) { $this->data .= $c."<br>"; }
$this->data .= "</td><td>";

// (D) QUOTATION INFO
foreach ($this->head as $i) {
	$this->data .= "<strong>$i[0]:</strong> $i[1]<br>";
}
$this->data .= "</td></tr></table>";

// (E) ITEMS
$this->data .= "<table id='items'><tr><th>ITEM</th><th>QUANTITY</th><th>UNIT PRICE</th><th>AMOUNT</th></tr>";
foreach ($this->items as $i) {
	$this->data .= "<tr><td><div>".$i[0]."</div>".($i[1]==""?"":"<small class='idesc'>$i[1]</small>")."</td><td>".$i[2]."</td><td>".$i[3]."</td><td>".$i[4]."</td></tr>";
}

// (F) TOTALS
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$this->data .= "<tr class='ttl'><td class='right' colspan='3'>$t[0]</td><td>$t[1]</td></tr>";
}}
$this->data .= "</table>";

// (G) NOTES
if (count($this->notes)>0) {
	$this->data .= "<div id='notes'>";
	foreach ($this->notes as $n) {
		$this->data .= $n."<br>";
	}
	$this->data .= "</div>";
}

// (H) ACCEPTANCE
if ($this->accept) {
	$this->data .= "<div id='accept'>Customer Acceptance<table><tr>".
	               "<td>Signature</td><td>Name</td><td>Date</td>".
	               "</tr></table>";
}

// (I) CLOSE
$this->data .= "</div></body></html>";
$mpdf->WriteHTML($this->data);
