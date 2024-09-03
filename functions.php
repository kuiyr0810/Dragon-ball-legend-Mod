<?php
function modifyJson($jsonContent, $functionName) {
    $data = json_decode($jsonContent, true);

    if ($data === null) {
        return false;
    }

    if ($functionName === 'allcharacterfullstar') {
        if (isset($data['item']['characterShards_'])) {
            foreach ($data['item']['characterShards_'] as &$shard) {
                if ($shard['count'] >= 100) {
                    $shard['count'] = 9999;
                }
            }
        }
    } elseif ($functionName === 'allcharacterfullawaking') {
        if (isset($data['item']['characterPlentyShards_'])) {
            foreach ($data['item']['characterPlentyShards_'] as &$shard) {
                $shard['count'] = 9999;
            }
        }
    } elseif ($functionName === 'maxLevel5000') {
        if (isset($data['unit']['unitInfo_'])) {
            foreach ($data['unit']['unitInfo_'] as &$unit) {
                $unit['level'] = 5000;
            }
        }
    } elseif ($functionName === 'addUnitsAndCharacters') {
        // 添加新的unit到unitInfo_
        if (isset($data['unit']['unitInfo_'])) {
            for ($i = 1; $i <= 621; $i++) {
                $exists = false;
                foreach ($data['unit']['unitInfo_'] as &$unit) {
                    if ($unit['id'] == $i) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $newUnit = [
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
                    ];
                    $data['unit']['unitInfo_'][] = $newUnit;
                }
            }
        }

        // 添加新的character到characterShards_
        if (isset($data['item']['characterShards_'])) {
            for ($i = 1; $i <= 621; $i++) {
                $exists = false;
                foreach ($data['item']['characterShards_'] as &$shard) {
                    if ($shard['characterType'] == $i) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $newCharacterShard = [
                        "characterType" => $i,
                        "count" => 9999
                    ];
                    $data['item']['characterShards_'][] = $newCharacterShard;
                }
            }
        }

        // 添加新的character到characterPlentyShards_
        if (isset($data['item']['characterPlentyShards_'])) {
            for ($i = 1; $i <= 621; $i++) {
                $exists = false;
                foreach ($data['item']['characterPlentyShards_'] as &$shard) {
                    if ($shard['characterType'] == $i) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $newCharacterPlentyShard = [
                        "characterType" => $i,
                        "count" => 9999
                    ];
                    $data['item']['characterPlentyShards_'][] = $newCharacterPlentyShard;
                }
            }
        }
    }

    return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function generateRandomCreateTime() {
    $prefix = "17136"; // 保持前五位不变
    $suffix = mt_rand(100000, 999999); // 生成六位随机数
    return (int)($prefix . $suffix);
}







