<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\parts\Experience;
use application\models\CvDataFactory;

/**
 * Class ExperienceController
 * @package administration\controllers
 */
class ExperienceController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/experience', [
            'active' => 'Period',
            'title' => 'Product Period',
            'parts' => new CvDataFactory()
        ]);
    }

    /**
     * @param array $parameters (item "id" is required)
     */
    public function actionUpdate(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/Product Period');
        }

        $result = (new Experience())->updateExperience($parameters['id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was updated' : 'Experience was not updated';
        Flash::set($status, $message);

        $this->redirect('/Product Period');
    }

    public function actionAdd()
    {
        $result = (new Experience())->createExperience($_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was created' : 'Experience was not created';
        Flash::set($status, $message);

        $this->redirect('/Product Period');
    }

    /**
     * @param array $parameters
     */
    public function actionDelete(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/Product Period');
        }

        $result = (new Experience())->deleteExperience($parameters['id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was deleted' : 'Experience was not deleted';
        Flash::set($status, $message);

        $this->redirect('/Product Period');
    }
}
