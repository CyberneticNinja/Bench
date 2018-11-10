<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/9/18
 * Time: 6:06 PM
 */

namespace Reporter;


class Reporter
{
    protected $fileName = "";

    protected $fileType = "";

    protected $output = "";

    /**
     * Reporter constructor.
     * @param $fileName
     * @param $fileType
     */
    public function __construct($fileName, $fileType)
    {
        if($fileType === ".pdf" || $fileType === ".html" || $fileType === ".txt"){
            $this->fileName = $fileName;
            $this->fileType = $fileType;
        }
        else{
            throw new \Exception('Filetypes must be .pdf,.html or.txt');
        }
    }

    //add comparator results
    public function add(string $notes, array $bench_comparator){
        if($this->getFileType() === '.html' || $this->getFileType() === '.pdf')   {
            $this->appendtoOutput('<h1>'.$notes.'</h1>');
            foreach ($bench_comparator as $key =>$values){
                $this->appendtoOutput('<em>'.$key.'</em><br/>');
                if(is_array($values)){
                    foreach ($values as $value){
                        $this->appendtoOutput($value.'<br/>');
                    }
                }
                else{
                    $this->appendtoOutput($values.'<br/>');
                }
            }
        }
        elseif($this->getFileType() === '.txt' )   {
            $this->appendtoOutput($notes.PHP_EOL);
            foreach ($bench_comparator as $key =>$values){
                $this->appendtoOutput($key.PHP_EOL);
                if(is_array($values)){
                    foreach ($values as $value){
                        $this->appendtoOutput($value.PHP_EOL);
                    }
                }
                else{
                    $this->appendtoOutput($values.PHP_EOL);
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     */
    public function setFileType(string $fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return $this->output;
    }

    //reset the output
    public function resetOutput() {
        $this->output = "";
    }
    /**
     * @param string $output
     */
    public function appendtoOutput(string $output)
    {
        $this->output .= $output;
    }

    //writing files
    public function write(){
        if($this->getFileType() === '.html'){
            $contents = '<html><head><title>Benchmark Project</title></head><body>'.$this->getOutput().'</body></html>';
            file_put_contents($this->getFileName().$this->getFileType(),$contents );
        }
        if($this->getFileType() === '.pdf'){
            $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__]);
            $mpdf->WriteHTML($this->getOutput());
            $mpdf->Output($this->getFileName().$this->getFileType(),'F');
        }
        elseif($this->getFileType() === '.txt'){
            $contents = 'BENCHMARK PROEJCT'.PHP_EOL.$this->getOutput();
            file_put_contents($this->getFileName().$this->getFileType(),$contents );
        }
    }

}