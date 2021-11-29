<?php
// (A) LOAD QUOTR
require "quolib/quotr.php";

// (B) SET QUOTATION DATA
// (B1) COMPANY INFORMATION
/* RECOMMENDED TO JUST PERMANENTLY CODE INTO QUOLIB/QUOTR.PHP > (C1)
$quotr->set("company", [
"http://localhost/code-boxx-logo.png",
"D:/http/code-boxx-logo.png",
"Code Boxx",
"Street Address, City, State, Zip",
"Phone: xxx-xxx-xxx | Fax: xxx-xxx-xxx",
"https://code-boxx.com",
"doge@code-boxx.com"
]); */

// (B2) QUOTATION HEADER
$quotr->set("head", [
	["QUOTATION #", "CB-123-456"],
	["Valid From", "2011-11-11"],
	["Valid Till", "2011-12-12"]
]);

// (B3) CUSTOMER
$quotr->set("customer", [
	"Customer Name",
	"Street Address",
	"City, State, Zip",
	"Tel, Email"
]);

// (B4) ITEMS - ADD ONE-BY-ONE
$items = [
	["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
	["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
	["Rubber Band", "", 10, "$0.10", "$1.00"],
	["Rubber Stamp", "", 3, "$12.30", "$36.90"],
	["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
];
// foreach ($items as $i) { $quotr->add("items", $i); }

// (B5) ITEMS - OR SET ALL AT ONCE
$quotr->set("items", $items);

// (B6) TOTALS
$quotr->set("totals", [
	["SUB-TOTAL", "$108.00"],
	["TAX 10%", "$10.80"],
	["GRAND TOTAL", "$118.80"]
]);

// (B7) NOTES, IF ANY
$quotr->set("notes", [
	"This quotation is not an invoice and it is non-contractual.",
	"YOUR TERMS AND CONDITIONS HERE."
]);

// (B8) INCLUDE SIGN-OFF ACCEPTANCE
$quotr->set("accept", true);

// (C) OUTPUT
// (C1) CHOOSE A TEMPLATE
 $quotr->template("apple");
// $quotr->template("banana");
// $quotr->template("blueberry");
// $quotr->template("lime");
// $quotr->template("simple");
// $quotr->template("strawberry");

// (C2) OUTPUT IN HTML
// 1 : DISPLAY IN BROWSER (DEFAULT)
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
 $quotr->outputHTML();
// $quotr->outputHTML(1);
// $quotr->outputHTML(2, "QUOTATION.html");
// $quotr->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "QUOTATION.html");

// (C3) OUTPUT IN PDF
// 1 : DISPLAY IN BROWSER (DEFAULT)
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
// $quotr->outputPDF();
// $quotr->outputPDF(1);
// $quotr->outputPDF(2, "QUOTATION.pdf");
// $quotr->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "QUOTATION.pdf");

// (C4) OUTPUT IN DOCX
// 1 : FORCE DOWNLOAD (DEFAULT)
// 2 : SAVE ON SERVER
// $quotr->outputDOCX();
// $quotr->outputDOCX(1, "QUOTATION.docx");
// $quotr->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "QUOTATION.docx");

// (D) USE RESET() IF YOU WANT TO CREATE ANOTHER ONE AFFTER THIS
// $quotr->reset();
