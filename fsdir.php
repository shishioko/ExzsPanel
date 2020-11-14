<?php
        function dir_to_array($dir){
            if (! is_dir($dir)) {
                return null;
            }
            $data = [];
            foreach (new DirectoryIterator($dir) as $f) {
                if ($f->isDot()) {
                        continue;
                }

                $path = $f->getPathname();
                $name = $f->getFilename();

                if ($f->isFile()) {
                        $data[] = [ 'file' => $name ];
                } else {
                        $files = dir_to_array($path);

                        $data[] = [ 'dir'  => $files,
                                    'name' => $name ];
                }
            }
            \usort($data, function($a, $b) {
                $aa = isset($a['file']) ? $a['file'] : $a['name'];
                $bb = isset($b['file']) ? $b['file'] : $b['name'];

                return \strcmp($aa, $bb);
            });
            return $data;
        }
        function dir_to_json($dir){
            $data = dir_to_array($dir);
            $data = json_encode($data);
            return $data;
        }
        if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
            print(dir_to_json(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]));
        }else{
            print("[{\"file\":\"Error Access denied\"}]");
        }
        ?>;