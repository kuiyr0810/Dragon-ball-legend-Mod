<?php
function dblmodify($jsonContent, $functionName) {
    $data = json_decode($jsonContent, true);

    if ($data === null) {
        return json_encode(['error' => '无效的 JSON 内容'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    switch ($functionName) {
        case 'allcharacterfullstar':
            if (isset($data['item']['characterShards_'])) {
                foreach ($data['item']['characterShards_'] as &$shard) {
                    if ($shard['count'] >= 100) {
                        $shard['count'] = 9999;
                    }
                }
            }
            break;

        case 'allcharacterfullawaking':
            if (isset($data['item']['characterPlentyShards_'])) {
                foreach ($data['item']['characterPlentyShards_'] as &$shard) {
                    $shard['count'] = 9999;
                }
            }
            break;

        case 'maxLevel5000':
            if (isset($data['unit']['unitInfo_'])) {
                foreach ($data['unit']['unitInfo_'] as &$unit) {
                    $unit['level'] = 5000;
                }
            }
            break;

        case 'addUnitsAndCharacters':
            if (isset($data['unit']['unitInfo_'])) {
                addEntities($data['unit']['unitInfo_'], 'id', 621, 'unit');
            }
            if (isset($data['item']['characterShards_'])) {
                addEntities($data['item']['characterShards_'], 'characterType', 621, 'shard');
            }
            if (isset($data['item']['characterPlentyShards_'])) {
                addEntities($data['item']['characterPlentyShards_'], 'characterType', 621, 'plentyShard');
            }
            break;

        default:
            return json_encode(['error' => '无效的功能名称'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function addEntities(&$array, $key, $limit, $type) {
    $existingIds = array_column($array, $key);
    for ($i = 1; $i <= $limit; $i++) {
        if (!in_array($i, $existingIds)) {
            $newEntity = ($type === 'unit') ? [
                "id" => $i,
                "exp" => 0,
                "level" => 5000,
                "isTraining" => false,
                "isDispatch" => false,
                "boost" => [
                    [
                        "boardId" => 1,
                        "releaseFlags_Low" => 0,
                        "releaseFlags_Hight" => 0
                    ]
                ],
                "createTime" => generateRandomCreateTime(),
                "friendshipPoint" => 0,
                "friendshipLevel" => 0,
                "friendshipLap" => 1,
                "strikeArtsBoost" => 1,
                "shotArtsBoost" => 1,
                "specialArtsBoost" => 1
            ] : [
                $key => $i,
                "count" => 9999
            ];
            $array[] = $newEntity;
        }
    }
}

function jsonmodify($jsonContent, $functionName) {
    $data = json_decode($jsonContent, true);

    if ($data === null) {
        return json_encode(['error' => '无效的 JSON 内容'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    switch ($functionName) {
        case 'jsonformat':
            return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        default:
            return json_encode(['error' => '无效的功能名称'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
    









