<?php
// (A) THE TABLE STYLE
$tableStyle = [
	"width" => 5000,
	"unit" => "pct",
	"alignment" => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER
];

// (B) COMPANY
$section = $pw->addSection();
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell(2500);
$cell->addText("QUOTATION",
	["color"=>"258ec7", "bold"=>true, "size"=>20],
	["spaceAfter" => 200, "spaceBefore"=>0]);
for ($i=2;$i<count($this->company);$i++) {
	$cell->addText($this->company[$i],
		["color" => "888888","size" => "9"],
		["spaceAfter" => 0,]
	);
}
$cell = $table->addCell(2500);
$cell->addImage($this->company[1], ["width"=>120, "alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT]);

// (C) CUSTOEMR
$section->addText(" ",[],["spaceBefore"=>200]);
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell(2500);
$cell->addText("CUSTOMER",["bold"=>true],["spaceAfter" => 0, "spaceBefore"=>0]);
foreach ($this->customer as $c) {
	$cell->addText($c,[],["spaceAfter" => 0, "spaceBefore"=>0]);
}

// (D) QUOTATION INFO
$cell = $table->addCell(2500);
foreach ($this->head as $i) {
	$textrun = $cell->addTextRun(["spaceAfter" => 0, "spaceBefore"=>0]);
	$textrun->addText($i[0].": ",["bold"=>true]);
	$textrun->addText($i[1]);
}

// (E) ITEMS
$section->addText(" ",[],["spaceBefore"=>200]);
$table = $section->addTable($tableStyle);
$table->addRow();
$style = [
	"borderBottomSize" => 18, "borderBottomColor" => "98c5dc",
	"borderTopSize" => 18, "borderTopColor" => "98c5dc", "bgColor" => "98c5dc"
];
$cell = $table->addCell(2000, $style);
$cell->addText("Item",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Quantity",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Unit Price",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Amount",["bold"=>true]);
$style = ["borderBottomSize" => 10, "borderBottomColor" => "c8d2d7", "bgColor" => "e4eff5"];
foreach ($this->items as $i) {
	$table->addRow();
	$cell = $table->addCell(2000, $style);
	$cell->addText($i[0]);
	if ($i[1]!="") { $cell->addText($i[1],["size"=>9,"color"=>"777777"]); }
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[2]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[3]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[4]);
}

// (F) TOTALS
$style = ["bgcolor"=>"98c5dc"];
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$table->addRow();
	$cell = $table->addCell(4000, array_merge($style, ["gridSpan" => 3]));
	$cell->addText($t[0], ["bold"=>true]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($t[1], ["bold"=>true]);
}}

// (G) NOTES
if (count($this->notes)>0) {
	$section->addText(" ");
	$style = ["bgcolor"=>"e4eff5"];
	$table = $section->addTable($tableStyle);
	$cell = $table->addRow()->addCell(5000, $style);
	foreach ($this->notes as $n) {
		$cell->addText($n);
	}
}

// (I) ACCEPTANCE
if ($this->accept) {
	$section->addText(" ");
	$section->addText("Customer Acceptance");
	$table = $section->addTable([
		"width" => 5000,
		"unit" => "pct"
	]);
	$style = [
		"borderTopSize" => 15,
		"borderBottomSize" => 15,
		"borderLeftSize" => 15,
		"borderRightSize" => 15,
		"borderTopColor" => "ffffff",
		"borderBottomColor" => "ffffff",
		"borderLeftColor" => "ffffff",
		"borderRightColor" => "ffffff",
		"bgColor" => "e4eff5"
	];
	$cell = $table->addRow()->addCell(1667, $style);
	$cell->addText("Signature",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
	$cell = $table->addCell(1667, $style);
	$cell->addText("Name",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
	$cell = $table->addCell(1666, $style);
	$cell->addText("Date",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
}
