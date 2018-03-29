<?php

class PFImageInputHooks {

      /**
       * @param $parser Parser
       * @return bool
       */
      public static function efPFIISetup( & $parser ) {
            $egPFIISettings = array();
            global $wgPageFormsFormPrinter;
            $wgPageFormsFormPrinter->registerInputType( 'InstantImageInput' );
      }
}
