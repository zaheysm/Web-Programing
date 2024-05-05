
	<?php 
        
        $q=$_GET["q"];
        
        $y="";
        
        $xml = file_get_contents("Books.xml");
        
        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($xml);
        
        $book = $xmlDoc->getElementsByTagName('book');
        $i=0;
        $y=array();
        foreach($book as $currentCatalog)
        {
            foreach($currentCatalog->childNodes as $node)
            {
                if ($node->nodeName == "genre")
                {
                    if ($node->nodeValue==$q)
                    {
                        $y[$i]=($node->parentNode);
                        $i++;
                        
                    }
                }
                
            }
        }
        for ($j=0;$j<$i;$j++){
            foreach($y[$j]->childNodes as $node)
            {
                if ($node->nodeName == "author")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
                
                if ($node->nodeName == "title")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
                
                if ($node->nodeName == "genre")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
                
                if ($node->nodeName == "price")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
                
                if ($node->nodeName == "publish_date")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
                
                if ($node->nodeName == "description")
                {
                    echo("<b>" . $node->nodeName . ":</b> ");
                    echo($node->nodeValue);
                    echo("<br>");
                }
            
            }
            echo "<br>";
        }
        
        ?>
