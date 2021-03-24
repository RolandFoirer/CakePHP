<?php

namespace App\Controller;

use App\Controller\Component\PictureComponent;
/**
*@property PictureComponent Picture
*/
class PicturesController extends AppController
{
    //public $paginate = [
        //'States' => ['scope' => 'states'],
        //'Lgas' => ['scope' => 'lgas'],
    //];

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function index(){
        $questions  = $this->Pictures
            ->find()
            ->where(['online >' =>0])
            ->limit(5)
            ->order(['id DESC'])
            ->all();
        $this->set(compact('questions'));
    }
    public function encode($in=null)
    {
        $name= $this->getRequest()->getQuery('name');
        $limit= $this->getRequest()->getQuery('limit');

        $dirname = WWW_ROOT . 'img/';
        if($in){
            $file=$dirname.$in.'.jpg';
            if(!file_exists($file)){
                return  $this->response->withStatus(404)->withStringBody(json_encode(['message'=>'image non valide']))->withType('application/json');
            }
            $photos=[$file];
        }
        else{
            $photos=  glob($dirname . "*$name*.jpg");
        }
        $out=[];
        foreach ($photos as $photo) {
            $exif = exif_read_data($photo);
            $file =$exif['FileName'] ?? '';
            $description = $exif['Description'] ?? '';
            $out[] = [
                'file' => $file,
                'description' => $description,
                'comment' => $exif['COMPUTED']['UserComment'] ?? '',
                'width' => $exif['ExifImageWidth'] ?? '',
                'author' => $exif['OwnerName'] ?? '',
                'height' => $exif['ExifImageLength'] ?? '',
                'html' => "<img src=\"$file\" alt=\"$description\">",
            ];
        }
        $out =array_slice($out, 0, $limit);
        return $this->response->withStringBody(json_encode($out))->withType('application/json');
    }
    public function view(){
        //$lgas = $this->paginate($this->Lgas, ['scope' => 'lgas']);
        //$states = $this->paginate($this->States, ['scope' => 'states']);
        //$this->set(compact('lgas', 'states'));
    }
    public function description($in=null){
        $name= $this->getRequest()->getQuery('name');
        $dirname = WWW_ROOT . 'img/';
        if($in){
            $file=$dirname.$in.'.jpg';
            if(!file_exists($file)){
                return  $this->response->withStatus(404)->withStringBody(json_encode(['message'=>'image non valide']))->withType('application/json');
            }
            $photos=[$file];
        }
        else{
            $photos=  glob($dirname . "*$name*.jpg");
        }
        $out=[];
        foreach ($photos as $photo) {
            $exif = exif_read_data($photo);
            $file =$exif['FileName'] ?? '';
            $description = $exif['Description'] ?? '';
            $out= [
                'file' => $file,
                'description' => $description,
                'comment' => $exif['COMPUTED']['UserComment'] ?? '',
                'width' => $exif['ExifImageWidth'] ?? '',
                'author' => $exif['OwnerName'] ?? '',
                'height' => $exif['ExifImageLength'] ?? '',
                'html' => '<img src="\\img\\'.htmlentities($file).'" alt="'.$description.'"/>',
            ];
        }
        $this->set(compact('out'));
    }
    public function add(){
        if(!empty($this->getRequest()->getData())){
            $this->Flash->success("Image sélectionnée"); //affiche un message de succès
            $result = $this->getRequest()->getData('submittedfile');
            $targetPath = 'img/'.$result->getClientFilename().'';
            if(file_exists($targetPath)){
                $this->Flash->error("Echec de l'upload !"); //affiche un message d'erreur
            }else {
                $result->moveTo($targetPath);
                $this->Flash->success("Upload effectué avec succès !"); //affiche un message de succès
            }
        }else{
            $this->Flash->error("Aucune image sélectionnée"); //affiche un message d'erreur
        }
    }

}
