<?php

namespace BitWasp\Bitcoin\Network\Messages;

use BitWasp\Bitcoin\Network\NetworkSerializable;
use BitWasp\Bitcoin\Serializer\Network\Message\GetBlocksSerializer;
use BitWasp\Buffertools\Buffer;

class GetBlocks extends NetworkSerializable
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var string[]
     */
    private $hashes;

    /**
     * @var Buffer
     */
    private $hashStop;

    /**
     * @param int $version
     * @param string[] $hashes
     * @param Buffer $hashStop
     */
    public function __construct(
        $version,
        array $hashes,
        $hashStop
    ) {
        $this->version = $version;
        $this->hashes = $hashes;
        $this->hashStop = $hashStop;
    }

    /**
     * @return string
     */
    public function getNetworkCommand()
    {
        return 'getblocks';
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string[]
     */
    public function getHashes()
    {
        return $this->hashes;
    }

    /**
     * @return Buffer
     */
    public function getHashStop()
    {
        return $this->hashStop;
    }

    /**
     * @return \BitWasp\Buffertools\Buffer
     */
    public function getBuffer()
    {
        return (new GetBlocksSerializer())->serialize($this);
    }
}
