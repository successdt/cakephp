<?php
/**
 *	CakePHP Controller to parse XML file
 */
class RssController extends AppController
{
    var $name = "Rss";
    var $helpers = array(
        'Html',
        'Common',
        'Form',
        "Ajax");
    var $layout = 'blog_template';

    function getrss()
    {
        App::import('Utility', 'Xml');
        $data = $this->data;
        $links = $this->Rss->query("select * from rsslinks as rss where rss.id=" . $data['link_id']); //Lấy link khi biết id của link
        //$feed_url=$data['link'];
        //debug($links);
        foreach ($links as $link) {
            $feed_url = $link['rss']['link']; //Lấy feed url từ bản
            $date = $this->Rss->find('first', array('conditions' => array('Rss.rsslink_id' =>$link['rss']['id']),'order'=>'Rss.pubDate DESC','fields'=>'pubDate')); //Tìm ngày cập nhập gần đây nhất
            $last_update=$date['Rss']['pubDate'];
            //debug($last_update);
            $xmlArray = Xml::toArray(Xml::build($feed_url)); //Chuyển từ file XML sang array
            $result = array();
            foreach ($xmlArray as $temp_item) {
                foreach ($temp_item['channel']['item'] as $data) {
                    $data['rsslink_id']=$link['rss']['id'];
                    $data['pubDate'] = date('Y-m-d', strtotime($data['pubDate']));
                    if($data['pubDate']>$last_update)
                    {
                        //Nếu ngày cập nhập cuối cùng nhỏ hơn thì lưu luôn
                        $this->Rss->saveAll($data);
                        array_push($result, $data['title']);
                    }
                    if($data['pubDate']==$last_update)
                    {
                        //Nếu bằng thì kiểm tra xem có chưa
                        $conditions = array('title' => $data['title']);
                        $title = $this->Rss->find('first', array('conditions' => $conditions)); //Kiểm tra xem bản ghi đã có trong DB chưa
                        //Nếu chưa có thì save        
                        if (!$title['Rss']['id']) {
                            $this->Rss->saveAll($data);
                            array_push($result, $data['title']);
                        }
                        
                    }
                }
            }
            $this->set('data', $result);
        }
    }
    function newrss()
    {

    }
    function rssedit()
    {
        $keyword = $this->Rss->query("select * from keywords");
        //debug($keyword);
        foreach ($keyword as $key) {
            $this->Rss->query("update rsses set category_id=" . $key['keywords']['category_id'] .
                " where title like '%" . $key['keywords']['keyword'] . "%'");
        }
    }
}
?>
