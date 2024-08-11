<?php

namespace App\NumNum;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TIN implements XmlSerializable
{
    private $TIN;
    private $BRN;
    private $SST;
    private $TTX;

    /**
     * @return string
     */
    public function getTIN(): ?string
    {
        return $this->TIN;
    }

    /**
     * @param mixed $TIN
     * @return TIN
     */
    public function setTIN($TIN): TIN
    {
        $this->TIN = $TIN;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBRN(): ?string
    {
        return $this->BRN;
    }

    /**
     * @param string $BRN
     * @return TIN
     */
    public function setBRN(?string $BRN): TIN
    {
        $this->BRN = $BRN;
        return $this;
    }

    /**
     * @return string
     */
    public function getSST(): ?string
    {
        return $this->SST;
    }

    /**
     * @param string $SST
     * @return TIN
     */
    public function setSST(?string $SST): TIN
    {
        $this->SST = $SST;
        return $this;
    }

    /**
     * @return string
     */
    public function getTTX(): ?string
    {
        return $this->TTX;
    }

    /**
     * @param string $TTX
     * @return TIN
     */
    public function setTTX(?string $TTX): TIN
    {
        $this->TTX = $TTX;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        if ($this->TIN !== null) {

            $writer->startElement(Schema::CBC . 'ID');
            $writer->writeAttribute('schemeID', 'TIN');
            $writer->text($this->TIN);
            $writer->endElement();

        }

        if ($this->BRN !== null) {

            $writer->startElement(Schema::CBC . 'ID');
            $writer->writeAttribute('schemeID', 'TIN');
            $writer->text($this->BRN);
            $writer->endElement();

        }

        if ($this->SST !== null) {

            $writer->startElement(Schema::CBC . 'ID');
            $writer->writeAttribute('schemeID', 'TIN');
            $writer->text($this->SST);
            $writer->endElement();

        }

        if ($this->TTX !== null) {

            $writer->startElement(Schema::CBC . 'ID');
            $writer->writeAttribute('schemeID', 'TTX');
            $writer->text($this->TTX);
            $writer->endElement();

        }
    }
}
