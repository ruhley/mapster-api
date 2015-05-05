<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class MapsController extends AppController {

        public function geoJson($id) {
            $geo_json = [
                'type' => 'FeatureCollection',
                'features' => [],
            ];

            $map = $this->Maps->get($id, ['contain' => ['Places']])->toArray();

            foreach ($map['places'] as $place) {
                $feature = [
                    'type' => 'Feature',
                    'geometry' => [],
                    'properties' => []
                ];

                foreach ($place as $field => $value) {
                    if ($field === 'coordinates') {
                        $coordinates = explode(',', $value);

                        foreach ($coordinates as &$coords) {
                            $coords = explode(' ', $coords);
                        }


                        if (count($coordinates) === 1) {
                            $feature['geometry']['type'] = 'Point';
                            $feature['geometry']['coordinates'] = $coordinates[0];
                        } else {
                            $feature['geometry']['type'] = 'LineString';
                            $feature['geometry']['coordinates'] = $coordinates;
                        }
                    } else {
                        $feature['properties'][$field] = $value;
                    }
                }

                array_push($geo_json['features'], $feature);
            }

            $this->Response->returnSuccess($geo_json);
        }
    }
?>
