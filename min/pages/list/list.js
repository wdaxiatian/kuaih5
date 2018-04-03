Page({
  data: {
    text: 'what',
    sub: '提交'
  },

  setreq: function (e) {
    wx.request({
      url: 'https://ltwxtest.mynatapp.cc/test/index.php', //仅为示例，并非真实的接口地址
      data: {
        x: '1',
        y: '2'
      },
      header: {
        'content-type': 'application/json' // 默认值
      },
      success: function (res) {
        console.log(res)
      }
    })
  }
})