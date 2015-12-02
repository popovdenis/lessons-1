<?php
class FirstException extends Exception {}
class SecondException extends FirstException {}

class Test {
    public function testing() {
        try {
            try {
                throw new SecondException();
            } catch (SecondException $e) {
                echo "Second Exception.";
                throw $e;
            } catch (FirstException $e) {
                echo "First Exception.";
                throw $e;
            }
        } catch (Exception $e) {
            echo "Basic Exception.";
        }
    }
}
(new Test)->testing();